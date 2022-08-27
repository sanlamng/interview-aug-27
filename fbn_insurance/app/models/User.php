<?php


class User
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new Database();
    }

    /**
     * @param stdClass $data_array
     * @return bool
     */
    public function newUser(stdClass $data_array)
    {

        $users_array = array($data_array->last_name, $data_array->first_name, $data_array->middle_name, $data_array->email, $data_array->mobile_phone, $data_array->password, $data_array->date_of_birth,$data_array->address,$data_array->state);

        $user_sql = "INSERT INTO customer_tbl (last_name, first_name, middle_name, email, mobile_phone, password, date_of_birth, address, state, created_at) VALUES(?,?,?,?,?,?,?,?,?,NOW())";
        $this->pdo->prepare($user_sql);
        return $this->pdo->execute($users_array) ? true : false;
    }

    /**
     * @param $email
     * @return mixed
     */
    public function getUser($email)
    {
        $select_sql = "SELECT * from  customer_tbl where email = ? LIMIT 1";
        $this->pdo->prepare($select_sql);
        return $this->pdo->single([$email]);
    }


}