import React, { useState, useContext } from "react";
import Moon from "./assets/svg/icon-moon.svg";
import Sun from "./assets/svg/icon-sun.svg";
import { AuthContext } from "./helpers/AuthContext";
import { BiLogOut } from "react-icons/bi";

export const Header = ({ handleMode, setShowProfile, showProfile }) => {
  const [switchModeImg, setSwitchModeImg] = useState(false);
  const { setAuthState } = useContext(AuthContext);

  return (
    <header>
      <h3>FINANCE APP</h3>
      <div className="btns-container">
        <img
          src={localStorage.getItem("toggle") === "enabled" ? Sun : Moon}
          alt="moon"
          className="toggleMode"
          onClick={() => {
            handleMode();
            document.body.classList.contains("dark-mode")
              ? localStorage.setItem("toggle", "enabled")
              : localStorage.setItem("toggle", "disabled");
            setSwitchModeImg(!switchModeImg);
          }}
        />
        <BiLogOut
          className="btn-logout"
          onClick={() => {
            setAuthState(false);
            localStorage.clear("accessToken");
          }}
        />
      </div>
    </header>
  );
};
