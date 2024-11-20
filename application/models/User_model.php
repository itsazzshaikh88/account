<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    protected $user_table; // Holds the name of the user table

    public function __construct()
    {
        parent::__construct();
        $this->user_table = 'users'; // Initialize user table
    }

    /**
     * Create a new user
     *
     * @param array $data User data
     * @return int Inserted user ID
     */
    public function create_user(array $data)
    {
        $this->db->insert($this->user_table, $data);
        return $this->db->insert_id();
    }

    /**
     * Get user by ID
     *
     * @param int $user_id User ID
     * @return array|null User data or null if not found
     */
    public function get_user_by_id(int $user_id): ?array
    {
        $query = $this->db->get_where($this->user_table, ['id' => $user_id]);
        return $query->row_array(); // Return user data or null
    }

    /**
     * Get user by email
     *
     * @param string $email User email
     * @return array|null User data or null if not found
     */
    public function get_user_by_email(string $email): ?array
    {
        $query = $this->db->get_where($this->user_table, ['email' => $email]);
        return $query->row_array(); // Return user data or null
    }

    /**
     * Update user data
     *
     * @param int $user_id User ID
     * @param array $data User data to update
     * @return bool TRUE on success, FALSE on failure
     */
    public function update_user(int $user_id, array $data): bool
    {
        $this->db->where('id', $user_id);
        return $this->db->update($this->user_table, $data);
    }

    /**
     * Delete a user
     *
     * @param int $user_id User ID
     * @return bool TRUE on success, FALSE on failure
     */
    public function delete_user(int $user_id): bool
    {
        $this->db->where('id', $user_id);
        return $this->db->delete($this->user_table);
    }

    /**
     * Get all users
     *
     * @return array List of users
     */
    public function get_all_users(): array
    {
        $query = $this->db->get($this->user_table);
        return $query->result_array(); // Return array of user data
    }

    /**
     * Get all users by query
     *
     * @return array List of users
     */
    public function get_all_users_by_query(): array
    {
        $query = $this->db->query("SELECT * FROM USERS");
        return $query->result_array(); // Return array of user data
    }

    /**
     * Check if a user exists by user ID
     *
     * @param int $user_id User ID
     * @return bool TRUE if user exists, FALSE otherwise
     */
    public function validate_user(int $user_id)
    {
        $query = $this->db->get_where($this->user_table, ['id' => $user_id]);
        return $query->row(); // Return true if user exists
    }



   
}
