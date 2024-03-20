<option value="">Select Subcategory</option>
@foreach ($subcategories as $subcategory)
    <option value="{{ $subcategory->id }}">{{ $subcategory->subcate_name }}</option>
@endforeach