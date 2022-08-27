import React, { useState } from "react";
import { FiAlertCircle } from "react-icons/fi";
export const Form = ({ showForm, handleShowForm, getProducts }) => {
  const [newInvoice, setNewInvoice] = useState({
    CustomerName: "",
    DOB: "",
    Phone: "",
    Product: "",
    Amount: "",
    PaymentDate: "",
  });
  const [fillInput, setFillInput] = useState(false);

  const handleOnChange = (e) => {
    const name = e.target.name;
    const value = e.target.value;
    setNewInvoice({ ...newInvoice, [name]: value });
  };
  const newTrans = async () => {
    await fetch("/create/create-product", {
      method: "POST",
      headers: {
        "content-type": "application/json",
        Accept: "application/json",
        accessToken: localStorage.getItem("accessToken"),
      },
      body: JSON.stringify({
        ...newInvoice,
      }),
    }).then((res) => res.json());
  };
  const handleSubmit = (e) => {
    e.preventDefault();
    newTrans();
    handleShowForm();
    setTimeout(() => {
      getProducts();
    }, 1000);
  };
  return (
    <section
      className={
        showForm ? "invoices-form show-invoices-form" : "invoices-form"
      }
    >
      <div className="form-header-container">
        <div className="invoices-form-header">
          <h1>Create Transaction</h1>
        </div>
        {fillInput && (
          <div className="fill-error-alert">
            <p>
              <FiAlertCircle />
              All fields must be filled
            </p>
          </div>
        )}
      </div>
      <form className="invoice-form" id="invoice-form">
        <div className="form-bill-from">
          <h5>Transaction Information</h5>
          <div className="input full-input">
            <label htmlFor="senderStreet"> Customer Name</label>
            <input
              type="text"
              id="senderStreet"
              name="CustomerName"
              value={newInvoice.CustomerName}
              onChange={handleOnChange}
              autoComplete="off"
            />
          </div>
          <div className="form-city-container">
            <div className="input city-input">
              <label htmlFor="senderCity"> Date Of Birth</label>
              <input
                type="date"
                id="senderCity"
                name="DOB"
                value={newInvoice.DOB}
                onChange={handleOnChange}
                autoComplete="off"
              />
            </div>
            <div className="input post-code-input">
              <label htmlFor="senderPostCode"> Phone</label>
              <input
                type="text"
                id="senderPostCode"
                name="Phone"
                value={newInvoice.Phone}
                onChange={handleOnChange}
                autoComplete="off"
              />
            </div>
          </div>
          <div className="input full-input">
            <label htmlFor="senderCountry"> Product</label>
            <input
              type="text"
              id="senderCountry"
              name="Product"
              value={newInvoice.Product}
              onChange={handleOnChange}
              autoComplete="off"
            />
          </div>
          <div className="input full-input">
            <label htmlFor="senderCountry"> Amount</label>
            <input
              type="text"
              id="senderCountry"
              name="Amount"
              value={newInvoice.Amount}
              onChange={handleOnChange}
              autoComplete="off"
            />
          </div>
          <div className="input full-input">
            <label htmlFor="senderCountry">Payment Date</label>
            <input
              type="date"
              id="senderCountry"
              name="PaymentDate"
              value={newInvoice.PaymentDate}
              onChange={handleOnChange}
              autoComplete="off"
            />
          </div>
        </div>
      </form>
      <div className="form-button-container">
        <button
          type="button"
          className="btn btn-discard"
          onClick={handleShowForm}
        >
          Discard
        </button>
        <button
          type="submit"
          className="btn btn-send"
          form="invoice-form"
          onClick={(e) => {
            handleSubmit(e);
          }}
        >
          Save & send
        </button>
      </div>
    </section>
  );
};
