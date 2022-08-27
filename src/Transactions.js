import React, { useEffect, useState, useMemo, useRef } from "react";
import { GoToTop } from "./GoToTop";
import plus from "./assets/svg/icon-plus.svg";
import { Form } from "./Form";
import moment from "moment";
import { useReactToPrint } from "react-to-print";
import { ProductsTable } from "./ProductsTable";
import ReactHTMLTableToExcel from "react-html-table-to-excel";

export const Transactions = ({ showForm, setShowForm }) => {
  const [returnedProducts, setReturnedProducts] = useState("");
  const [isExpanded, setIsExpanded] = useState(false);
  const [deleteID, setDeleteID] = useState(0);
  const [isPdf, setIsPdf] = useState(false);

  //------------------------------------------------------------------------------------------------------------------------------------
  const getProducts = async () => {
    try {
      const allProducts = await fetch("/api/products", {
        method: "GET",
        headers: {
          "content-type": "application/json",
          Accept: "application/json",
          accessToken: localStorage.getItem("accessToken"),
        },
      }).then((res) => res.json());
      setReturnedProducts(allProducts);
    } catch (error) {
      console.log(error);
    }
  };

  useEffect(() => {
    getProducts();
  }, []);

  console.log(returnedProducts);
  //----------------------------------------------------------------------------------------------------------------------------------------------------------
  function refreshPage() {
    window.location.reload(false);
  }
  const getId = (id) => {
    returnedProducts.name &&
      returnedProducts.name.find((item) => item.id === id);
    setDeleteID(id);
  };

  const componentRef = useRef();
  const handlePrint = useReactToPrint({
    content: () => componentRef.current,
  });

  const handleShowForm = (e) => {
    setShowForm(!showForm);
  };
  return (
    <section className="invoices">
      <Form
        showForm={showForm}
        setShowForm={setShowForm}
        handleShowForm={handleShowForm}
        getProducts={getProducts}
      />
      {showForm && (
        <div
          className="form-background"
          onClick={() => {
            handleShowForm();
          }}
        ></div>
      )}

      {!isPdf && (
        <>
          <div className="invoices-header">
            <div className="invoice-length-wrapper">
              <h3>Transactions</h3>
              {returnedProducts.name && (
                <p>
                  {returnedProducts.name.length > 1
                    ? returnedProducts.name.length + " transactions available"
                    : returnedProducts.name.length === 0
                    ? "0 transactions available"
                    : returnedProducts.name.length + " transaction available"}
                </p>
              )}
            </div>

            <div
              className="new-invoice-container"
              onClick={() => {
                handleShowForm();
              }}
            >
              <div className="plus-circle">
                <img src={plus} alt="" />
              </div>
              <button type="button" className="new-invoice">
                New
              </button>
            </div>
          </div>

          {returnedProducts.name && returnedProducts.name.length > 0 && (
            <div className="btn-generate-container">
              <button
                onClick={() => {
                  setIsPdf(!isPdf);
                }}
                className="btn-generate"
              >
                Save to Device
              </button>
            </div>
          )}
        </>
      )}
      <section className="invoices-container-wrapper">
        {!isPdf &&
          returnedProducts.name &&
          returnedProducts.name.map((product) => {
            const {
              TransId,
              CustomerName,
              DOB,
              Phone,
              Product,
              Amount,
              PaymentDate,
            } = product;
            return (
              <div
                key={TransId}
                className={
                  isExpanded && TransId === deleteID
                    ? "invoices-container expanded-transactions"
                    : "invoices-container"
                }
                onClick={() => {
                  getId(TransId);
                  setIsExpanded(true);
                }}
              >
                {isExpanded && deleteID !== TransId && (
                  <>
                    <div className="invoices-TransId-wrapper">
                      <h5>
                        <span>#</span>
                        {TransId}
                      </h5>
                    </div>

                    <p>{CustomerName}</p>
                    <p>{Product}</p>
                    <h4>₦{Amount}</h4>
                  </>
                )}
                {!isExpanded && (
                  <>
                    <div className="invoices-TransId-wrapper">
                      <h5>
                        <span>#</span>
                        {TransId}
                      </h5>
                    </div>

                    <p>{CustomerName}</p>
                    <p>{Product}</p>
                    <h4>₦{Amount}</h4>
                  </>
                )}
                {TransId === deleteID && isExpanded && (
                  <div className="full-details">
                    <div className="item">
                      <h4>Name:</h4>
                      <p>{CustomerName}</p>
                    </div>
                    <div className="item">
                      <h4>DOB:</h4>
                      <p>{moment(new Date(DOB)).format("DD/MM/YYYY")}</p>
                    </div>
                    <div className="item">
                      <h4>Phone:</h4>
                      <p>{Phone}</p>
                    </div>
                    <div className="item">
                      <h4>Product:</h4>
                      <p>{Product}</p>
                    </div>
                    <div className="item">
                      <h4>Payment Date:</h4>
                      <p>
                        {moment(new Date(PaymentDate)).format("DD/MM/YYYY")}
                      </p>
                    </div>
                    <div className="item">
                      <h4>Amount:</h4>
                      <h3>₦ {Amount}</h3>
                    </div>
                  </div>
                )}
              </div>
            );
          })}
        {isPdf && (
          <>
            <ProductsTable ref={componentRef} />{" "}
            <div className="btn-generate-container">
              <div
                onClick={() => {
                  setTimeout(() => {
                    refreshPage();
                  }, 500);
                }}
              >
                <ReactHTMLTableToExcel
                  id="test-table-xls-button"
                  className="download-table-xls-button btn-generate"
                  table="table-to-xls"
                  filename={"Transactions"}
                  sheet={"Transactions"}
                  buttonText="Save as Excel"
                />
              </div>

              <button
                onClick={() => {
                  handlePrint();
                  setTimeout(() => {
                    setIsPdf(false);
                  }, 500);
                }}
                className="btn-generate btn-pdf"
              >
                Save as PDF
              </button>
            </div>{" "}
          </>
        )}
      </section>
      <GoToTop />
    </section>
  );
};
