import React, {useEffect, useState} from 'react';
import Select from 'react-select';
import NoSsr from '@material-ui/core/NoSsr';
import instance from "../instance";

const Search = () => {
    const [selectedOption, setSelectedOption] = useState(null)
    const [options, setOptions] = useState([])
    const handleChange = (selectedOption) => {
        setSelectedOption(selectedOption);
        window.location.href = selectedOption.value
    }

    useEffect(() => {
        instance
            .get('acr/sitemaps/maps')
            .then(function (res) {
                setOptions(res.data)
            })
    }, [])
    return (
        <NoSsr>
            <Select
                value={selectedOption}
                onChange={handleChange}
                options={options}
            />
        </NoSsr>

    );
}

export default Search;