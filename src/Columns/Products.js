// import { format } from "date-fns";
import { ColumnFilter } from "./ColumnFilter";
import moment from "moment";

export const PRODUCTS = [
  {
    Header: "Id",
    Footer: "Id",
    accessor: "TransId",
    disableFilters: true,
  },
  {
    Header: "Customer Name",
    Footer: "Customer Name",
    accessor: "CustomerName",
  },
  {
    Header: "DOB",
    Footer: "DOB",
    accessor: "DOB",
    Cell: ({ value }) => {
      return moment(new Date(value)).format("DD/MM/YYYY");
    },
  },

  {
    Header: "Phone Number",
    Footer: "Phone Number",
    accessor: "Phone",
  },
  {
    Header: "Product",
    Footer: "Product",
    accessor: "Product",
  },
  {
    Header: "Amount Paid",
    Footer: "Amount Paid",
    accessor: "Amount",
  },
  {
    Header: "Payment Date",
    Footer: "Payment Date",
    accessor: "PaymentDate",
    Cell: ({ value }) => {
      return moment(new Date(value)).format("DD/MM/YYYY");
    },
  },
];
