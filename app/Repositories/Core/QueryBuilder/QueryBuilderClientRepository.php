<?php

namespace App\Repositories\Core\QueryBuilder;

use App\Repositories\Contracts\ClientRepositoryInterface;
use App\Repositories\Core\BaseQueryBuilderRepository;

class QueryBuilderClientRepository extends BaseQueryBuilderRepository implements ClientRepositoryInterface
{
    protected $table = 'clients';

    public function search(array $data)
    {
        return $this->db
                        ->table($this->tb)
                        ->where(function ($query) use ($data) {
                            if (isset($data['title'])) {
                                $query->where('title', $data['title']);
                            }

                            if (isset($data['url'])) {
                                $query->orWhere('url', $data['url']);
                            }

                            if (isset($data['description'])) {
                                $desc = $data['description'];
                                $query->where('description', 'LIKE', "%{$desc}%");
                            }
                        })
                        ->orderBy('id', 'desc')
                        ->paginate();
    }

    public function store(array $data)
    {
        return $this->db->table($this->tb)
                    ->insert($data);
    }

    public function update($id, array $data)
    {
        return $this->db->table($this->tb)
                    ->where('id', $id)
                    ->update($data);
    }
}
