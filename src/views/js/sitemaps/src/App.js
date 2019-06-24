import React from 'react';
import {HashRouter as Routes, Route, Switch} from 'react-router-dom';
import Sitemaps from "./pages/Sitemaps";
import Search from "./pages/Search";

function App() {
    return (
        <Routes>
            <Switch>
                <Route exact path={'/acr/sitemaps/index'} component={Sitemaps}/>
                <Route exact path={'/acr/sitemaps/search'} component={Search}/>
            </Switch>
        </Routes>
    )
}

export default App;
