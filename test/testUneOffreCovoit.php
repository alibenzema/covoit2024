<?php
include_once '../modeles/DAOOffreCovoit.php';

var_dump(getUneOffreCovoit(1));
try {
    var_dump(getUneOffreCovoit(100));
} catch (\Throwable $th) {
    echo $th->getMessage();
}

?>