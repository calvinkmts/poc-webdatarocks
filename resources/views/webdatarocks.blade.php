<html>
<head></head>
<body>
<div id="wdr-component"></div>
<link href="https://cdn.webdatarocks.com/latest/webdatarocks.min.css" rel="stylesheet"/>
<script src="https://cdn.webdatarocks.com/latest/webdatarocks.toolbar.min.js"></script>
<script src="https://cdn.webdatarocks.com/latest/webdatarocks.js"></script>
<script>
    async function fetchData() {
        try {
            const response = await fetch('/data');
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            const jsonData = await response.json();

            var pivot = new WebDataRocks({
                container: "#wdr-component",
                toolbar: true,
                report: {
                    dataSource: {
                        data: jsonData,
                        dataType: "json"
                    },
                    slice: {
                        rows: [
                            { uniqueName: "class" },
                            { uniqueName: "account" }
                        ],
                        columns: [
                            { uniqueName: "year" },
                            { uniqueName: "month" }
                        ],
                        measures: [
                            {
                                uniqueName: "debit",
                                aggregation: "sum",
                                format: "currency"
                            }
                        ]
                    }
                }
            });
        } catch (error) {
            console.error('Error fetching data:', error);
        }
    }

    fetchData();
</script>
</body>
</html>
