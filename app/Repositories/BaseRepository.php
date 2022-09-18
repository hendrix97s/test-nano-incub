<?php

namespace App\Repositories;

class BaseRepository
{
  protected $model;

  public function __construct($model)
  {
    $this->model = new $model;
  }

  public function all()
  {
    return $this->model->all();
  }

  public function find($id)
  {
    return $this->model->find($id);
  }

  public function create($data)
  {
    return $this->model->create($data);
  }
  
  public function update($id, $data)
  {
    $model = $this->model->find($id);
    $model->update($data);
    return $model;
  }

  public function updateByUuid($uuid, $data)
  {
    $model = $this->model->where('uuid', $uuid)->first();
    return $model->update($data);
  }

  public function delete($id)
  {
    $model = $this->model->find($id);
    $model->delete();
    return $model;
  }

  public function deteByUuid($uuid)
  {
    $model = $this->model->where('uuid', $uuid)->first();
    return $model->delete();
  }

  public function paginate($perPage = 10)
  {
    return $this->model->paginate($perPage);
  }

}