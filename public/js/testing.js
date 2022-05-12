const testing = [
    {
        id: 2,
        province: "Kompong Thum",
        image: "Screenshot 2022-04-02 195350.jpg",
        created_at: "2022-05-01T04:34:17.000000Z",
        updated_at: "2022-05-01T04:34:17.000000Z",
        restaurants_count: 2,
    },
    {
        id: 6,
        province: "Svay Rieng",
        image: "Screenshot 2022-04-02 155941.jpg",
        created_at: "2022-05-01T07:00:30.000000Z",
        updated_at: "2022-05-01T07:00:30.000000Z",
        restaurants_count: 0,
    },
];

let myData = [];

for (var i = 0; i < testing.length; i++) {
    myData.push(testing[i].province);
}
console.log("Mydata", myData);
