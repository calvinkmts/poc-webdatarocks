<html>
<head></head>
<body>
<div id="output"></div>
<!-- Add jQuery UI CSS -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pivottable/2.23.0/pivot.min.css" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Add jQuery UI JS -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pivottable/2.23.0/pivot.min.js"></script>
<script>
    async function fetchData() {
        try {
            const response = await fetch('/data');
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            const jsonData = await response.json();

            // Convert the "debit" field to a number
            const formattedData = jsonData.map((record) => ({
                ...record,
                debit: parseFloat(record.debit),
            }));

            console.log("formattedData:", formattedData);

            $("#output").pivotUI(formattedData, {
                rows: ["class"],
                cols: ["year"],
                vals: ["debit"],
                aggregatorName: "Sum",
            });
        } catch (error) {
            console.error('Error fetching data:', error);
        }
    }

    fetchData();
</script>
</body>
</html>
