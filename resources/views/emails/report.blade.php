<h1 style="font-size: 22px; margin-bottom: 15px;">Weekend Spending Report</h1>

<table style="width: 100%; border-collapse: collapse; font-size: 18px;">
    <thead>
    <tr>
        <th style="border: 1px solid #ccc; padding: 8px; text-align: left;">Category</th>
        <th style="border: 1px solid #ccc; padding: 8px; text-align: right;">Amount</th>
        <th style="border: 1px solid #ccc; padding: 8px; text-align: right;">Percent</th>
    </tr>
    </thead>
    <tbody>
    @foreach($categoriesData as $data)
        <tr style="{{ $loop->index < 5 ? 'font-weight: bold;' : '' }}">
            <td style="border: 1px solid #ccc; padding: 8px;">
                {{ $data['category']->label }}
            </td>
            <td style="border: 1px solid #ccc; padding: 8px; text-align: right;">
                {{ number_format($data['totalAmount'], 0, ',', '.') }}&nbsp;rsd
            </td>
            <td style="border: 1px solid #ccc; padding: 8px; text-align: right;">
                {{ $data['percent'] }}%
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<h2>Food Subcategories</h2>
<ul>
    @foreach($foodSubcategories as $sub)
        <li><h2>{{ $sub['category']->label }} - {{ $sub['percent'] }}%</h2></li>
    @endforeach
</ul>
