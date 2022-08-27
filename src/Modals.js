import React, { useState } from "react";

export const Modals = ({
  allInvoices,
  showDelete,
  setShowDelete,
  showPaid,
  setShowPaid,
  showClear,
  setShowClear,
}) => {
  return (
    <div>
      {showDelete && (
        <div className="show-delete">
          <div className="delete-modal">
            <div>
              <h1>Confirm Delete</h1>
              <p>
                Are you sure you want to delete this invoice? This action cannot
                be undone.{" "}
              </p>
            </div>
            <div className="modal-delete-buttons">
              <div className="each-delete-button">
                <button
                  className="discard-btn"
                  onClick={() => {
                    setShowDelete(false);
                    window.location.reload(false);
                  }}
                >
                  discard
                </button>
                <button
                  onClick={() => {
                    localStorage.setItem(
                      "newArray",
                      JSON.stringify(allInvoices)
                    );
                    setShowDelete(false);
                  }}
                >
                  delete
                </button>
              </div>
            </div>
          </div>
        </div>
      )}
      {/* delete modal end */}
      {showClear && (
        <div className="show-delete">
          <div className="delete-modal">
            <div>
              <h1>Delete All Invoices?</h1>
              <p>
                Are you sure you want to delete all invoices? This action cannot
                be undone.
              </p>
            </div>
            <div className="modal-delete-buttons">
              <div className="each-delete-button">
                <button
                  className="discard-btn"
                  onClick={() => {
                    setShowClear(false);
                    window.location.reload(false);
                  }}
                >
                  discard
                </button>
                <button
                  onClick={() => {
                    localStorage.setItem(
                      "newArray",
                      JSON.stringify(allInvoices)
                    );
                    setShowClear(false);
                  }}
                >
                  delete
                </button>
              </div>
            </div>
          </div>
        </div>
      )}
      {/* delete modal end */}
      {/* paid modal start */}
      {showPaid && (
        <div className="show-paid">
          <div className="paid-modal">
            <div>
              <h1>Set Invoice as Paid?</h1>
              <p>
                Are you sure you want to set this invoice as a paid invoice?
              </p>
            </div>
            <div className="modal-paid-buttons">
              <div className="each-paid-button">
                <button
                  className="discard-btn"
                  onClick={() => {
                    setShowDelete(false);
                    window.location.reload(false);
                  }}
                >
                  discard
                </button>
                <button
                  className="confirm-button"
                  onClick={() => {
                    localStorage.setItem(
                      "newArray",
                      JSON.stringify(allInvoices)
                    );
                    setShowPaid(false);
                  }}
                >
                  confirm
                </button>
              </div>
            </div>
          </div>
        </div>
      )}
      {/* paid modal end */}
    </div>
  );
};
