<?php


namespace App\Repositories;


interface AdRepositoryInterface
{
    function getAll();

    function create(array $attributes);

    function delete($id);
}