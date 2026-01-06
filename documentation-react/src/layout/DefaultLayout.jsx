import { Outlet } from "react-router-dom";
import TabletHeader from "../components/TabletHeader";
import MobileHeader from "../components/MobileHeader";
import Sidebar from "../components/Sidebar";
import Footer from "../components/Footer";

export default function DefaultLayout () {

    return (
    
        <div className="row">
            
            <div className="d-none d-lg-block col-lg-3">
                <Sidebar />
            </div>

            <div className="d-lg-none col-12">
                <TabletHeader />
                <MobileHeader />
            </div>
            
            <div className="col-12 col-lg-9">
                <Outlet />
            </div>

            <div className="col-12">
                <Footer />
            </div>
        </div>
    )
}