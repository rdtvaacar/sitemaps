import React, {useEffect, useState} from 'react';
import {Form, Input} from '@rocketseat/unform';
import * as Yup from 'yup';
import instance from "../instance";

const Sitemaps = () => {
    const [links, setLinks] = useState([])
    const schema = Yup.object().shape({
        name: Yup.string()
            .required(),
        link: Yup.string()
            .required(),
        tag: Yup.string()
            .required(),
    });

    useEffect(() => {
        instance
            .get('acr/sitemaps/links')
            .then(function (res) {
                setLinks(res.data)
            })
    }, [])

    function handleSubmit(data) {
        instance
            .post('acr/sitemaps/links', {
                name: data.name,
                link: data.link,
                tag: data.tag,
            })
            .then(function (res) {
                setLinks(res.data)
            })
    }

    const deleteLink = (id) => {
        instance
            .delete(`acr/sitemaps/link/${id}`)
            .then(function (res) {
                setLinks(res.data)
            })
    }
    const GetForm = () => {
        return (
            <Form schema={schema} onSubmit={handleSubmit}>
                <Input placeholder="Name" className={'form-control'} name="name"/>
                <Input placeholder="Link" className={'form-control'} name="link"/>
                <Input placeholder="Tag" className={'form-control'} name="tag"/>
                <br/>
                <button className="btn btn-primary btn-block" type="submit">Save</button>
            </Form>)
    }
    const Links = () => {
        return links.map(link => (
                <tr key={link.id}>
                    <td>{link.name}</td>
                    <td width="10%">
                        <div onClick={() => deleteLink(link.id)} className="btn btn-danger btn-sm">DEL</div>
                    </td>
                </tr>
            )
        )
    }
    return (
        <div>
            <GetForm/>
            <table className="table ">
                <tbody>
                <Links/>
                </tbody>
            </table>
        </div>
    );
}

export default Sitemaps;