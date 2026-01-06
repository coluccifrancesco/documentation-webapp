import { Outlet } from "react-router-dom";
import TabletHeader from "../components/TabletHeader";
import MobileHeader from "../components/MobileHeader";
import Sidebar from "../components/Sidebar";
import Footer from "../components/Footer";

export default function DefaultLayout () {

    return (
    
        <div className="row">
            
            <Sidebar />
            <TabletHeader />
            <MobileHeader />
            
            <div className="col-12 col-lg-9">
                <Outlet />
            </div>

            <div className="col-12">
                <Footer />
            </div>
        </div>
    )
}