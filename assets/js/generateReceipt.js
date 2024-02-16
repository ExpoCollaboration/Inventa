function generateReceipt() {
    const quantity = document.getElementById("quantity").value;
    const payment = document.getElementById("payment").value;
    const productName = document.getElementById("productName").value;
    const transactionNo = document.getElementById("transactionNo").value;
    const price = document.getElementById("productPrice").value;
    const customerName = document.getElementById("customerName").value;
    const totalprice = document.getElementById("totalprice").value;

    var currentDateTime = new Date();
    var hours = currentDateTime.getHours() % 12 || 12;
    var minutes = currentDateTime.getMinutes();
    var amOrPm = (currentDateTime.getHours() < 12) ? "AM" : "PM";

    var formattedDateTime = currentDateTime.toISOString().slice(0, 10) + " " + hours + ":" + (minutes < 10 ? "0" + minutes : minutes) + amOrPm;

    const customWidth = 350;
    const customHeight = 450;

    const receiptDefinition = [
        { text: "Receipt", style: "header" },
        { text: "---------------------------------------------------------------------------------------------------", style: "centeredLine" },
        {
            columns: [
                {
                    width: 100,
                    text: "Date:",
                    style: "label"
                },
                {
                    width: '*',
                    text: formattedDateTime,
                    style: "valueRight"
                }
            ],
            margin: [0, 0, 0, 0]
        },
        {
            columns: [
                {
                    width: 100,
                    text: "Customer Name:",
                    style: "label"
                },
                {
                    width: '*',
                    text: customerName,
                    style: "valueRight"
                }
            ],
            margin: [0, 2, 0, 0]
        },
        {
            columns: [
                {
                    width: 100,
                    text: "Transaction No:",
                    style: "label"
                },
                {
                    width: '*',
                    text: transactionNo,
                    style: "valueRight"
                }
            ],
            margin: [0, 0, 0, 10]
        },
        {
            columns: [
                {
                    width: 100,
                    text: productName + ' x ' + quantity,
                    style: "label"
                },
                {
                    width: '*',
                    text: "₱" + (price * quantity),
                    style: "valueRight"
                }
            ],
            margin: [0, 0, 0, 15]
        },
        {
            columns: [
                {
                    width: 100,
                    text: "Payment:",
                    style: "label"
                },
                {
                    width: '*',
                    text: "₱" + payment,
                    style: "valueRight"
                }
            ],
        },
        {
            columns: [
                {
                    width: 100,
                    text: "Change:",
                    style: "label"
                },
                {
                    width: '*',
                    text: "₱" + (payment - price * quantity),
                    style: "valueRight"
                }
            ],
        },
        { text: "\n", style: "receiptInfo" },
        { text: "Thank you! Come Again", style: "footer" },
        { text: "Expo Collaboration", style: "footer" },
        { text: "---------------------------------------------------------------------------------------------------", style: "centeredLine", margin: [0, 2] }
    ];
    
    
    const pdfDefinition = {
        content: receiptDefinition,
        pageOrientation: 'portrait',
        pageMargins: [10, 10, 10, 10],
        pageSize: {
            width: customWidth,
            height: customHeight
        },
        styles: {
            header: {
                fontSize: 18,
                bold: true,
                alignment: 'center',
                margin: [0, 5, 0, 10]
            },
            centeredLine: {
                fontSize: 12,
                alignment: 'center',
                margin: [0, 10]
            },
            label: {
                fontSize: 12,
                width: 100,
                margin: [0, 10, 5, 0]
            },
            valueRight: {
                fontSize: 12,
                alignment: 'right',
                margin: [0, 10, 5, 0]
            },
            receiptInfo: {
                fontSize: 12,
                margin: [0, 0, 0, 5]
            },
            footer: {
                fontSize: 12,
                italic: true,
                alignment: 'center',
                margin: [0, 2, 0, 0]
            }
        }
    };

    const pdfFileName = customerName + "_Receipt.pdf";

    pdfDefinition.filename = pdfFileName;
    
    pdfMake.createPdf(pdfDefinition).open();
}

function uploads() {
    const quantity = document.getElementById("quantity").value;
    const payment = document.getElementById("payment").value;
    const productName = document.getElementById("productName").value;
    const transactionNo = document.getElementById("transactionNo").value;
    const price = document.getElementById("productPrice").value;
    const customerName = document.getElementById("customerName").value;

    var currentDateTime = new Date();
    var hours = currentDateTime.getHours() % 12 || 12;
    var minutes = currentDateTime.getMinutes();
    var amOrPm = (currentDateTime.getHours() < 12) ? "AM" : "PM";

    var formattedDateTime = currentDateTime.toISOString().slice(0, 10) + " " + hours + ":" + (minutes < 10 ? "0" + minutes : minutes) + amOrPm;

    const customWidth = 350;
    const customHeight = 450;

    const receiptDefinition = [
        { text: "Receipt", style: "header" },
        { text: "---------------------------------------------------------------------------------------------------", style: "centeredLine" },
        {
            columns: [
                {
                    width: 100,
                    text: "Date:",
                    style: "label"
                },
                {
                    width: '*',
                    text: formattedDateTime,
                    style: "valueRight"
                }
            ],
            margin: [0, 0, 0, 0]
        },
        {
            columns: [
                {
                    width: 100,
                    text: "Customer Name:",
                    style: "label"
                },
                {
                    width: '*',
                    text: customerName,
                    style: "valueRight"
                }
            ],
            margin: [0, 2, 0, 0]
        },
        {
            columns: [
                {
                    width: 100,
                    text: "Transaction No:",
                    style: "label"
                },
                {
                    width: '*',
                    text: transactionNo,
                    style: "valueRight"
                }
            ],
            margin: [0, 0, 0, 10]
        },
        {
            columns: [
                {
                    width: 100,
                    text: productName + ' x ' + quantity,
                    style: "label"
                },
                {
                    width: '*',
                    text: "₱" + (price * quantity),
                    style: "valueRight"
                }
            ],
            margin: [0, 0, 0, 15]
        },
        {
            columns: [
                {
                    width: 100,
                    text: "Total Price:",
                    style: "label"
                },
                {
                    width: '*',
                    text: "₱" + (price * quantity),
                    style: "valueRight"
                }
            ],
        },
        {
            columns: [
                {
                    width: 100,
                    text: "Payment:",
                    style: "label"
                },
                {
                    width: '*',
                    text: "₱" + payment,
                    style: "valueRight"
                }
            ],
        },
        {
            columns: [
                {
                    width: 100,
                    text: "Change:",
                    style: "label"
                },
                {
                    width: '*',
                    text: "₱" + (payment - price * quantity),
                    style: "valueRight"
                }
            ],
        },
        { text: "\n", style: "receiptInfo" },
        { text: "Thank you! Come Again", style: "footer" },
        { text: "Expo Collaboration", style: "footer" },
        { text: "---------------------------------------------------------------------------------------------------", style: "centeredLine", margin: [0, 2] }
    ];
    
    
    const pdfDefinition = {
        content: receiptDefinition,
        pageOrientation: 'portrait',
        pageMargins: [10, 10, 10, 10],
        pageSize: {
            width: customWidth,
            height: customHeight
        },
        styles: {
            header: {
                fontSize: 18,
                bold: true,
                alignment: 'center',
                margin: [0, 5, 0, 10]
            },
            centeredLine: {
                fontSize: 12,
                alignment: 'center',
                margin: [0, 10]
            },
            label: {
                fontSize: 12,
                width: 100,
                margin: [0, 10, 5, 0]
            },
            valueRight: {
                fontSize: 12,
                alignment: 'right',
                margin: [0, 10, 5, 0]
            },
            receiptInfo: {
                fontSize: 12,
                margin: [0, 0, 0, 5]
            },
            footer: {
                fontSize: 12,
                italic: true,
                alignment: 'center',
                margin: [0, 2, 0, 0]
            }
        }
    };

    // Generate a unique filename for the PDF
    const pdfFileName = customerName + "_Receipt.pdf";

    pdfMake.createPdf(pdfDefinition).getBlob((blob) => {
    const downloadLink = document.createElement('a');
    downloadLink.href = window.URL.createObjectURL(blob);
    downloadLink.download = pdfFileName;

    document.body.appendChild(downloadLink);
    downloadLink.click();

    document.body.removeChild(downloadLink);

    savePdfOnServer(blob, pdfFileName);
    });


    function savePdfOnServer(blob, filename) {
    const formData = new FormData();
    formData.append('pdf', blob, filename);

    fetch('save_pdf.php', {
        method: 'POST',
        body: formData,
    })
        .then(response => response.json())
        .then(data => {
        console.log('File uploaded successfully:', data);
        })
        .catch(error => {
        console.error('Error uploading file:', error);
        });
    }
}