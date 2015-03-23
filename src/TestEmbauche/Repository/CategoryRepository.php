<?php

namespace TestEmbauche\Repository;

use Doctrine\DBAL\Connection;
use TestEmbauche\Model\Category;

class CategoryRepository
{
    protected  $db;

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    public function getByid($id){
        $queryBuilder = $this->db->createQueryBuilder('a');
        $queryBuilder
            ->select('a.*')
            ->from('category', 'a')
            ->where('a.id = :id')
            ->setParameter('id', $id);
        $statement = $queryBuilder->execute();
        $categoryData = $statement->fetch();
        $categoryEntity = $this->buildCategory($categoryData);
        return $categoryEntity;
    }

    public function getAll()
    {
        $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
            ->select('a.*')
            ->from('category', 'a');
        $statement = $queryBuilder->execute();
        $categoryData = $statement->fetchAll();
        $data = array();
        foreach ($categoryData as $dataRows) {
            $data += array($dataRows['id'] => $dataRows['name']);
        }
        return $data;
    }

    public function save($category)
    {
        $categoryData = array(
            'name' => $category->getName()
        );

        if ($category->getId()) {
            $this->db->update('category', $categoryData, array('id' => $category->getId()));

        } else {
            $this->db->insert('category', $categoryData);
            $id = $this->db->lastInsertId();
            $category->setId($id);
        }
    }

    public function delete($id)
    {
        return $this->db->delete('category', array('id' => $id));
    }

    public function buildCategory($data){
        $category = new Category();
        $category->setId($data['id']);
        $category->setName($data['name']);
        return $category;
    }
}
