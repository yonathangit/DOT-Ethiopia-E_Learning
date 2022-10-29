import "./App.css"
import AuthUser from './pages/Authentication/AuthUser';
import Header from "./components/header/Header"
import {BrowserRouter as Router, Route, Routes} from 'react-router-dom';
import Home from "./pages/Homepage/Home"
import Footer from "./components/Footer/Footer";
import Registration from "./pages/Authentication/register";
import Courses from "./pages/Coursespage/Courses";
import Login from "./pages/Authentication/login";
import About from "./pages/Aboutpage/About";
import Dashboard from "./pages/Authentication/dashboard";

function App() {
    return(
      <Router>
        <Header />
        
        <Routes>
        <Route exact path="/" element={<Home />} />
        <Route exact path="/Coursespage" element={<Courses />} />
        <Route exact path="/Aboutpage" element={<About />} />
        <Route exact path="/dashboard" element={<Dashboard />}  />
        <Route exact path="/register" element={<Registration />} />
        <Route exact path="/login" element={<Login />} />
         </Routes>
         <Footer />
      </Router>
    );
      
    
  }
  
  

export default App