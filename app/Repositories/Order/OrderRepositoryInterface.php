<?php


namespace App\Repositories;


interface OrderRepositoryInterface
{
    function getAll();

    function getById($id);

    function updateStatus($id, array $attributes);

    function delete($id);
}