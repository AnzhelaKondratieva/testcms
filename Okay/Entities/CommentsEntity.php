<?php


namespace Okay\Entities;


use Okay\Core\Entity\Entity;

class CommentsEntity extends Entity
{

    protected static $fields = [
        'id',
        'parent_id',
        'object_id',
        'name',
        'email',
        'ip',
        'type',
        'text',
        'date',
        'approved',
        'lang_id',
    ];

    protected static $defaultOrderFields = [
        'id DESC',
    ];
    
    protected static $searchFields = [
        'name',
        'text',
        'email',
    ];

    protected static $table = '__comments';
    protected static $tableAlias = 'c';

    protected function filter__approved($value, &$filter)
    {
        $ip_filter = '';
        if (isset($filter['ip'])) {
            $ip_filter = " OR c.ip = :ip";
            $this->select->bindValue('ip', $filter['ip']);
            // Удалим фильтр по IP, т.к. в чистом виде он нам не нужен
            unset($filter['ip']);
        }

        $this->select->where("(c.approved = :approved {$ip_filter})");
        $this->select->bindValue('approved', (int)$value);
    }


    protected function filter__has_parent($value)
    {
        $this->select->where('c.parent_id' . (!empty($value) ? '>0' : '=0'));
    }
    
    public function delete($ids)
    {
        $ids = (array)$ids;
        foreach ($ids as $id) {
            foreach ((array)$ids as $id) {
                $this->setLastModifyEntities($id);
            }

            $children = $this->cols(['id'])->find(['parent_id'=>$id]);
            foreach ($children as $childId) {
                $this->delete($childId);
            }
        }

        return parent::delete($ids);
    }

    public function add($comment)
    {
        $comment = (object)$comment;
        $comment->date = 'now()';
        $id = parent::add($comment);

        $this->setLastModifyEntities($id);
        
        return $id;
    }

    public function update($ids, $comment)
    {
        parent::update($ids, $comment);
        foreach ((array)$ids as $id) {
            $this->setLastModifyEntities($id);
        }

        return true;
    }
    
    private function setLastModifyEntities($commentId)
    {
        $c = $this->cols([
            'object_id',
            'type',
            'approved'
        ])->get((int)$commentId);

        if (!empty($c) && $c->approved == 1) {

            if ($c->type == 'blog') {
                $update = $this->queryFactory->newUpdate();
                $update->table('__blog')
                    ->set('last_modify', 'now()')
                    ->where('id=:id')
                    ->bindValue('id', $c->object_id);

                $this->db->query($update);
            } elseif ($c->type == 'product') {
                $update = $this->queryFactory->newUpdate();
                $update->table('__products')
                    ->set('last_modify', 'now()')
                    ->where('id=:id')
                    ->bindValue('id', $c->object_id);

                $this->db->query($update);
            }

        }
    }
}
