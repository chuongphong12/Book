<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'txtIsbn' => 'required',
            'txtAuthor' => 'required',
            'txtPublisher' => 'required',
            'txtCompany' => 'required',
            'sltParent'=>'required',
            'txtDescription'=>'required',
            'txtPage' => 'required',
            'txtRelease' => 'required',
            'txtUnit_price'=>'required',
            'txtPromotion_price'=>'required',
            'txtUnit'=>'required',
            'txtTitle'=>'required|unique:books,title',
            'fImages'=>'required|image'
        ];
    }
    public function messages(){
        return[
            'sltParent.required'=>'Hãy lựa chọn danh mục sản phẩm !',
            'txtTitle.required'=>'Nhập vào tên sản phẩm . ',
            'txtTitle.unique'=>'Tên sản phẩm đã tồn tại .',
            'txtAuthor.required'=>'Nhập vào tên tác giả . ',
            'txtPublisher.required'=>'Nhập vào tên nhà xuất bản . ',
            'txtCompany.required'=>'Nhập vào tên công ty phát hành . ',
            'txtDescription.required'=>'Nhập vào mô tả . ',
            'txtPage.required'=>'Nhập vào số trang . ',
            'txtRelease.required'=>'Nhập vào ngày phát hành . ',
            'txtUnit_price.required' => "Hãy nhập vào giá niêm yết .",
            'txtPromotion_price.required' => "Hãy nhập vào giá khuyến mãi .",
            'txtUnit.required' => "Hãy nhập vào đơn vị .",
            'fImages.required'=>'Bạn chưa chọn hình ảnh !',
            'fImages.image'=>'Hình ảnh không đúng định dạng .'
        ];
    }
}
