<?php

namespace App\Database;

interface DAOInterface
{

	/** @param int $id Id of the item to get. */
	public function get($id);

	/** @param string $title The title of the Todo. */
	public function save($title);

	/** Gets all items. */
	public function getAll();

	/** @param int $id Id of the item to destroy. */
	public function delete($id);

	/**
	 * @param int $id Id of the item to update.
	 * @param string $title The title of the item.
	 */
	public function update($id, $title);
}