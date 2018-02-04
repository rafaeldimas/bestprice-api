<?php

namespace BestPrice\Support\Domain\Repository;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class Repository
{
    /**
     * @var string
     */
    protected $modelClass;

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function newQuery()
    {
        return app()->make($this->modelClass)->newQuery();
    }

    /**
     * @param array $data
     * @return Model
     */
    public function factory(array $data = [])
    {
        $model = $this->newQuery()->getModel();

        $this->fillModel($model, $data);

        return $model;
    }

    /**
     * @param Model $model
     * @param $data
     */
    protected function fillModel(Model $model, array $data = [])
    {
        $model->fill($data);
    }

    /**
     * @param Model $model
     * @return Model
     */
    public function save(Model $model)
    {
        $model->save();

        return $model;
    }

    /**
     * @param array $data
     * @return Model
     */
    public function create(array $data = [])
    {
        $model = $this->factory($data);

        return $this->save($model);
    }

    /**
     * @param Model $model
     * @param array $data
     * @return Model
     */
    public function update(Model $model, array $data = [])
    {
        $this->fillModel($model, $data);

        return $this->save($model);
    }

    /**
     * @param Model $model
     * @return Model
     * @throws \Exception
     */
    public function delete(Model $model)
    {
        $model->delete();

        return $model;
    }

    /**
     * @param Collection $collection
     */
    public function deleteCollection(Collection $collection)
    {
        $collection->each(function (Model $model) {
            $this->delete($model);
        });
    }

    /**
     * @param null $query
     * @param int $take
     * @param bool $paginate
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|Collection|\Illuminate\Support\Collection|static[]
     */
    public function doQuery($query = null, $take = 15, $paginate = true)
    {
        if (!$query) {
            $query = $this->newQuery();
        }

        if ($paginate) {
            return $query->paginate($take);
        }

        if ($take) {
            return $query->take($take)->get();
        }

        return $query->get();
    }

    /**
     * @param int $take
     * @param bool $paginate
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|Collection|\Illuminate\Support\Collection|static[]
     */
    public function getAll($take = 15, $paginate = true)
    {
        return $this->doQuery(null, $take, $paginate);
    }
}