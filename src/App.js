import "./App.css";
import "./Table.css";
import "./form.css";
import "./dark-mode.css";
import { Header } from "./Header";
import { Transactions } from "./Transactions";
import {
  BrowserRouter as Router,
  Route,
  Switch,
  useLocation,
} from "react-router-dom";
import { useState, useEffect } from "react";
import { TransitionGroup, CSSTransition } from "react-transition-group";
import { AuthContext } from "./helpers/AuthContext";
import { UserLogin } from "./UserLogin";
import { UserValidation } from "./UserValidation";

function App() {
  const [toggleMode, setToggleMode] = useState(false);
  const [showForm, setShowForm] = useState(false);
  const [showProfile, setShowProfile] = useState(false);
  const [signIn, setSignIn] = useState(false);
  const [authState, setAuthState] = useState(false);

  useEffect(() => {
    if (localStorage.getItem("accessToken")) {
      setAuthState(true);
    }
  }, []);

  const location = useLocation();

  toggleMode
    ? document.body.classList.add("dark-mode")
    : document.body.classList.remove("dark-mode");

  showForm
    ? document.body.classList.add("body-still")
    : document.body.classList.remove("body-still");

  // storing the current mode in the local Storage
  const handleMode = () => {
    document.body.classList.toggle("dark-mode");
    document.body.classList.contains("dark-mode")
      ? localStorage.setItem("darkMode", "enabled")
      : localStorage.setItem("darkMode", "disabled");
  };
  return (
    <AuthContext.Provider
      value={{
        authState,
        setAuthState,
        signIn,
        setSignIn,
      }}
    >
      <Header
        handleMode={handleMode}
        toggleMode={toggleMode}
        setToggleMode={setToggleMode}
        setShowProfile={setShowProfile}
        showProfile={showProfile}
      />
      <TransitionGroup>
        <CSSTransition timeout={200} classNames="fade" key={location.key}>
          <Switch location={location}>
            <Route exact path="/">
              {authState ? (
                <Transactions showForm={showForm} setShowForm={setShowForm} />
              ) : (
                <UserLogin />
              )}
            </Route>
            <Route exact path="/login" children={<UserLogin />} />
            <Route exact path="/register" children={<UserValidation />}></Route>
          </Switch>
        </CSSTransition>
      </TransitionGroup>
    </AuthContext.Provider>
  );
}

export default App;
