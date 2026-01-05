import { Outlet } from "react-router-dom";
import Header from "../components/Header";
import Sidebar from "../components/Sidebar";
import Footer from "../components/Footer";

export default function DefaultLayout () {

    return <div className="row">
        
        <Sidebar />

        <Header />
        
        <div className="col-12 col-lg-9">
            <Outlet />
            
            <Footer />
        </div>


    </div>
}