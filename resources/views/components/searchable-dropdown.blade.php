@props([
        'itemId', 'collection', 'itemLabel', 'itemValue', 'itemDescription',
        'searchable', 'multipleChoices', 'propertyName', 'description', 'selectedId',
        'initialValue', 'additionalItems' => []
    ])

@once
    @push('css')
        <link rel="stylesheet" href="{{ asset('css/virtual-select.min.css') }}">
    @endpush
@endonce

<div wire:ignore
    {!!
        $attributes->merge([
            'class' => 'w-full',
        ])
    !!}></div>

@push('scripts')
    @once
        <script src="{{ asset('js/virtual-select.min.js')}}"></script>
    @endonce

    <script>
        @php($newPropertyName = str_replace('.', '', $propertyName))
        let {{  $newPropertyName . 'Collection' }} = [
                    @foreach($collection as $item)
                        {
                            label: "{{ $item->{$itemLabel} }}",
                            value: "{{ $item->{$itemValue} }}",
                            description: "{{ $item->{$itemDescription} }}",
                        },
                    @endforeach
                    @if(count($additionalItems))
                        @foreach($additionalItems[0] as $label => $value)
                            {
                                label: "{{ $label }}",
                                value: "{{ $value }}",
                                description: "{{ $description }}",
                            },
                        @endforeach
                    @endif
                ];
            VirtualSelect.init({
                ele: "#{{ $itemId }}",
                options: {{ $newPropertyName. 'Collection' }},
                multiple: Boolean({{ $multipleChoices }}), // "{{ $multipleChoices == 'yes' ? true : false }}"
                search: Boolean({{ $searchable }}), // "{{ $searchable == 'yes' ? true : false }}"
                selectedValue: "{{ $selectedId }}",
                hasOptionDescription: Boolean({{ $description }}) // "{{ $itemDescription == 'yes' ? true : false }}"
            });
            let {{ $newPropertyName . 'SelectedItems'}} = document.querySelector("#{{ $itemId }}")
            @if(isset($initialValue))
                document.querySelector('#{{ $itemId }}').setValue("{{ $initialValue }}");
            @endif
            if ({{ $newPropertyName . 'SelectedItems'}}) {
                {{ $newPropertyName . 'SelectedItems'}}.addEventListener('change', () => {
                    let data = {{ $newPropertyName . 'SelectedItems'}}.value
                })
            }
    </script>
@endpush
