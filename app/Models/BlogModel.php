<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table = 'blog';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id', 'by', 'judul', 'slug', 'gambar', 'isi'
    ];
    protected $useTimestamps = false;
    protected $createdField = 'created_date';
    protected $updatedField = 'updated_date';
    public function getBlog($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
    public function select($slug)
    {
        $sql = "Select * from blog where slug = '$slug'";
        $query = $this->db->query($sql);
        $array = $query->getResultArray();
        return $array;
    }

    public function cekSlug($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
    public function insert_blog($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
    public function update_blog($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id' => $id]);
    }
    public function search($keyword)
    {
        // $builder = $this->table('pasien');
        // $builder->like('Nama_Pasien', $keyword);
        // return $builder;

        return $this->table('blog')->like('judul', $keyword)->orLike('id', $keyword)->orLike('isi', $keyword)->findAll();
    }
}
