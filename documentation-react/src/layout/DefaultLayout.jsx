import { Outlet } from "react-router-dom";
import TabletHeader from "../components/TabletHeader";
import MobileHeader from "../components/MobileHeader";
import Sidebar from "../components/Sidebar";
import Footer from "../components/Footer";

export default function DefaultLayout() {

    return (

        // tieni ferma sidebar quando scorri

        <div className="row vh-percentage">

            <div className="d-none d-lg-block col-lg-3">
                <Sidebar />
            </div>

            <div className="d-lg-none col-12">
                <TabletHeader />
                <MobileHeader />
            </div>

            <div className="col-12 col-lg-9 d-flex flex-column">
                <Outlet />
                <Footer />
            </div>

        </div>

    )
}