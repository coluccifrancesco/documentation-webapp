import { Outlet } from "react-router-dom";
import TabletHeader from "../components/TabletHeader";
import MobileHeader from "../components/MobileHeader";
import Sidebar from "../components/Sidebar";
import Footer from "../components/Footer";

export default function DefaultLayout() {
    return (
        <div className="row h-100 w-100 mx-0">
            <div className="d-none d-lg-block col-lg-3">
                <Sidebar />
            </div>

            <div className="d-lg-none col-12 ">
                <TabletHeader />
                <MobileHeader />
            </div>

            <div className="col-12 col-lg-9 main-content-wrapper d-flex flex-column justify-content-between vh-percentage">    
                <Outlet />
                <Footer />    
            </div>

        </div>
    )
}