<?php


class Transaction
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
    public function newTransaction(stdClass $data_array)
    {

        $trans_array = array($data_array->amount, $data_array->payment_date, $data_array->customer_id, $data_array->product_id, $data_array->transaction_reference, $data_array->source);

        $trans_sql = "INSERT INTO transaction_tbl(amount, payment_date, customer_id, product_id, transaction_reference, source) VALUES(?,?,?,?,?,?)";
        $this->pdo->prepare($trans_sql);

        return $this->pdo->execute($trans_array) ? true : false;
    }

    /**
     * @param $customer_id
     * @return mixed
     */
    public function getAllTransaction($customer_id)
    {
        $select_sql = "SELECT * from  transaction_tbl t1 left join product_tbl t2 on t1.product_id = t2.id left join (SELECT t31.id, t31.first_name, t31.last_name, t31.middle_name from customer_tbl t31)t3 on t3.id = t1.customer_id where customer_id = ? AND transaction_status = 1";
        $this->pdo->prepare($select_sql);
        $trans_array = array($customer_id);
        return $this->pdo->resultSet($trans_array);
    }

    public function getSingleTransaction($customer_id, $id)
    {
        $select_sql = "SELECT * from transaction_tbl t1 left join product_tbl t2 on t1.product_id = t2.id where customer_id = ? and id= ? and transaction_status = 1";
        $this->pdo->prepare($select_sql);
        return $this->pdo->single([$customer_id, $id]);
    }
    public function getSingleTransactionByRef($ref)
    {
        $select_sql = "SELECT * from transaction_tbl t1 left join product_tbl t2 on t1.product_id = t2.id where transaction_reference = ? LIMIT 1";
        $this->pdo->prepare($select_sql);
        $trans_array = array($ref);
        return $this->pdo->single($trans_array);
    }

    public function getSumAndCount($customer_id){
        $select_sql = "SELECT SUM(amount) as total_amount, COUNT(*) as total_investment FROM transaction_tbl WHERE customer_id = ?";
        $this->pdo->prepare($select_sql);
        $trans_array = array($customer_id);
        return $this->pdo->resultSet($trans_array);
    }



}