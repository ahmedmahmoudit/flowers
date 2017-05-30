<?php


namespace App\Repositories;


interface UserRepositoryInterface
{
    function getAll();

    function getById($id);

    function update($id, array $attributes);

    function delete($id);

    function disable($id);

    function activate($id);
}