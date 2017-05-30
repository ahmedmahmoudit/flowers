<?php


namespace App\Repositories;


interface CouponRepositoryInterface
{
    function getAll();

    function getById($id);

    function create(array $attributes);

    function update($id, array $attributes);

    function delete($id);

    function disable($id);

    function activate($id);
}