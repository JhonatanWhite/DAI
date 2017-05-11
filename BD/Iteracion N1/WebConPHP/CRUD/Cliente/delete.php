<?php

require_once "../../DAO/ClienteDAO.php";

ClienteDAO::delete($_GET["id"]);
header("Location: listar.php");
die();
