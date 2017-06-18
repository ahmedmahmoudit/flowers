<?php


namespace App\Repositories;

use App\Ad;
use Intervention\Image\Facades\Image;

class AdRepository implements AdRepositoryInterface
{
    /**
     * @var $model
     */
    private $model;

    /**
     * EloquentAd constructor.
     *
     * @param Ad $model
     */
    public function __construct(Ad $model)
    {
        $this->model = $model;
    }

    /**
     * Get all ads.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * Create a new ad.
     *
     * @param array $attributes
     *
     * @return Ad
     */
    public function create(array $attributes)
    {
        $this->checkOrderExist($attributes['order']);
        $imageName = str_random(15);
        Image::make($attributes['image'])->resize(350, 450)->encode('jpg')->save('uploads/ads/'.$imageName.'.jpg');

        $data = [
            'order' => $attributes['order'],
            'image' => $imageName.'.jpg',
            'link'  => $attributes['link']
        ];

        return $this->model->create($data);
    }

    /**
     * check if slide already exist with same order.
     *
     * @param int $order
     */
    public function checkOrderExist($order)
    {
        $ad = $this->model->where('order', $order)->first();
        if($ad)
        {
            $nextOrder = $this->nextAdOrder();
            $ad->update([
                'order'  => $nextOrder
            ]);
        }
    }

    /**
     * Get next order number in slides.
     *
     * @return  int $order
     */
    public function nextAdOrder()
    {
        $ad = $this->model->all()->max('order');
        $nextOrder = $ad + 1;

        return$nextOrder;
    }

    /**
     * Delete an ad.
     *
     * @param integer $id
     *
     * @return boolean
     */
    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }
}