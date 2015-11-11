<?php

namespace pagfacu\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface OrderRepository
 * @package namespace pagfacu\Repositories;
 */
interface OrderRepository extends RepositoryInterface
{
    public function getByIdAndDeliveryman($id,$idDeliveryman);
}
