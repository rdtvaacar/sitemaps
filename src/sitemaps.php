<?php

namespace acr\sitemaps;

use acr\sitemaps\models\AcrSitemap;
use Illuminate\Http\Request;

class sitemaps
{
    function index(AcrSitemap $data)
    {
        $datas  = $data->get();
        $values = [];
        foreach ($datas as $data) {
            $values[] = ['value' => $data->link, 'label' => "$data->name, ($data->tag)"];
        }
        return $values;

    }

    function destroy(Request $request)
    {
        $model = new AcrSitemap();
        $model->where('id', $request->id)->delete();
        return $this->links();

    }

    function create(Request $request)
    {
        $model       = new AcrSitemap();
        $model->name = $request->name;
        $model->link = $request->link;
        $model->tag  = $request->tag;
        $model->save();
        return $this->links();
    }

    function links()
    {
        $model = new AcrSitemap();
        return $model->get();
    }
}