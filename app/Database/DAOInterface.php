<?php

namespace App\Database;

interface DAOInterface
{
	public function get($id);
	public function save($title);
	public function getAll();
	public function delete($id);
	public function update($id, $title);
}