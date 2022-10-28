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
import Dashboard from '../src/pages/Authentication/dashboard';

function App() {
    return(
      <Router>
        <Header />
        <Home />
        <Routes>
        <Route path="/" element={<Home />} />
        <Route path="/" element={<Dashboard />} />
        <Route path="/Coursespage" element={<Courses />} />
        <Route path="/dashboard" element={<Dashboard />} />
        <Route path="/Aboutpage" element={<About />} />
        <Route path="/register" element={<Registration />} />
        <Route path="/login" element={<Login />} />
         </Routes>
         <Footer />
      </Router>
    );
      
    
  }
  
  

export default App