<?php

namespace Controllers;


//use DAO\OwnerDAO as OwnerDAO;
//use DAO\GuardianDAO as GuardianDAO;
//use DAO\PetDAO as PetDAO;
use SQLDAO\PetDAO as PetDAO;
use SQLDAO\OwnerDAO as OwnerDAO;
use SQLDAO\GuardianDAO as GuardianDAO;
use SQLDAO\ReservationDAO as ReservationDAO;
use Models\Pet as Pet;
use Models\User as User;
use Models\Owner as Owner;
use Models\Reservation;
use \Exception as Exception;

class OwnerController
{
    function __construct()
    {
        require_once(ROOT . "/Utils/validateSession.php");

        if ($_SESSION["type"] == "guardian") {
            header("location: " . FRONT_ROOT . "Guardian/HomeGuardian");
        }
    }

    public function HomeOwner()
    {
        try {
            $owner_DAO = new OwnerDAO();

            $user = $owner_DAO->GetById($_SESSION["id"]);

            require_once VIEWS_PATH . "home_owner.php";
        } catch (Exception $e) {
            header("location: " . FRONT_ROOT . "Auth/ShowLogin");
        }
    }

    public function ShowEdit()
    {
        try {
            $user = new OwnerDAO();

            $user = $user->GetByid($_SESSION["id"]);

            require_once VIEWS_PATH . "edit_owner.php";
        } catch (Exception $e) {
            header("location: " . FRONT_ROOT . "Auth/ShowLogin");
        }
    }

    public function Edit($dni, $birth_date = null,  $name = null, $last_name = null, $adress = null, $phone = null)
    {
        try {
            $ownerDAO = new OwnerDAO();

            $user = new User();

            $user->setId($_SESSION["id"]);

            $user->setName($name);

            $user->setLast_name($last_name);

            $user->setAdress($adress);

            $user->setPhone($phone);

            $user->setBirth_date($birth_date);


            $owner = new Owner();

            $owner->setDni($dni);


            $ownerDAO->Edit($user, $owner);

            header("location: " . FRONT_ROOT . "Owner/HomeOwner");
        } catch (Exception $e) {
            header("location: " . FRONT_ROOT . "Auth/ShowLogin");
        }
    }

    public function SearchGuardian($name = null, $rating = null, $preferred_size = null, $preferred_size_cat = null, $location = null, $price = null, $stringDates = null, $alert = null)
    {
        try {

            $guardian_DAO = new GuardianDAO();

            $filters = array();

            if ($name != null) {
                array_push($filters, ["name", $name]);
            }

            if ($rating != null) {
                array_push($filters, ["reputation", $rating]);
            }

            if ($preferred_size != null && $preferred_size != "*") {
                array_push($filters, ["preferred_size_dog", $preferred_size]);
            }

            if ($preferred_size_cat != null && $preferred_size_cat != "*") {
                array_push($filters, ["preferred_size_cat", $preferred_size_cat]);
            }

            if ($location != null) {
                array_push($filters, ["adress", $location]);
            }

            if ($price != null) {
                array_push($filters, ["price", $price]);
            }

            if ($stringDates != null && $stringDates != "") {
                $stringDates = explode(",", $stringDates);
            } else {
                $stringDates = [];
            }

            array_push($filters, ["available_dates", $stringDates]);

            if ($filters != []) {
                $guardians = $guardian_DAO->SearchGuardiansByFilters($filters);
            } else {
                $guardians = $guardian_DAO->GetAll();
            }

            require_once VIEWS_PATH . "guardianList.php";
        } catch (Exception $e) {

            header("location: " . FRONT_ROOT . "Auth/ShowLogin");
        }
    }

    function ViewGuardianProfile($id, $alert = null)
    {
        try {
            $guardianDAO = new GuardianDAO();
            $PetDAO = new PetDAO();

            $guardian = $guardianDAO->GetById($id);
            $PetList = $PetDAO->GetPetsByOwner($_SESSION["id"]);

            $availableDatesJson = json_encode($guardian->getType_data()->getAvailable_date());

            if ($guardian) {
                require_once VIEWS_PATH . "owner_GuardianProfile.php";
            } else {
                header("location: " . FRONT_ROOT . "Owner/SearchGuardian");
            }
        } catch (Exception $e) {
            header("location: " . FRONT_ROOT . "Auth/ShowLogin");
        }
    }

    function ViewReservationsOwner($state = null, $alert = null)
    {
        try {


            $reservationDAO = new ReservationDAO();

            if ($state && $state != "*") {
                $reservations = $reservationDAO->GetByGuardianOrOwner($_SESSION["id"], "owner", $state);
            } else {
                $reservations = $reservationDAO->GetByGuardianOrOwner($_SESSION["id"], "owner");
            }

            require_once VIEWS_PATH . "owner_reservationsList.php";
        } catch (Exception $e) {
            header("location: " . FRONT_ROOT . "Auth/ShowLogin");
        }
    }
}
