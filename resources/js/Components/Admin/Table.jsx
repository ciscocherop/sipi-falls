function Table({ columns, data, onRowClick, emptyMessage = 'No data available' }) {
    if (!data || data.length === 0) {
        return (
            <div className="bg-white rounded-lg shadow overflow-hidden">
                <div className="p-8 text-center text-gray-500">
                    {emptyMessage}
                </div>
            </div>
        );
    }

    return (
        <div className="bg-white rounded-lg shadow overflow-hidden">
            <div className="overflow-x-auto">
                <table className="min-w-full divide-y divide-gray-200">
                    <thead style={{ backgroundColor: 'var(--neutral-light)' }}>
                        <tr>
                            {columns.map((column, index) => (
                                <th
                                    key={index}
                                    className="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider"
                                    style={{ color: 'var(--neutral-gray)' }}
                                >
                                    {column.label}
                                </th>
                            ))}
                        </tr>
                    </thead>
                    <tbody className="bg-white divide-y divide-gray-200">
                        {data.map((row, rowIndex) => (
                            <tr
                                key={rowIndex}
                                onClick={() => onRowClick && onRowClick(row)}
                                className={onRowClick ? 'hover:bg-gray-50 cursor-pointer transition-colors' : ''}
                            >
                                {columns.map((column, colIndex) => (
                                    <td
                                        key={colIndex}
                                        className="px-6 py-4 whitespace-nowrap text-sm"
                                        style={{ color: 'var(--neutral-gray)' }}
                                    >
                                        {column.render
                                            ? column.render(row[column.key], row)
                                            : row[column.key]
                                        }
                                    </td>
                                ))}
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>
        </div>
    );
}

export default Table;
