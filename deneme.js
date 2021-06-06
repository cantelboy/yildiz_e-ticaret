const menus = [
    {
        name: "erkek ayakkabisi",
        UrunSayisi: null,
        created_at: null,
        id: 1,
        parentId: null,
        updated_at: null
    },
    {
        name: "Klasik Ayakkabılar",
        UrunSayisi: 20,
        created_at: null,
        id: 2,
        parentId: 1,
        updated_at: null
    },
    {
        name: "Kışlık Ayakkabılar",
        UrunSayisi: 20,
        created_at: null,
        id: 3,
        parentId: 1,
        updated_at: null
    },
    {
        name: "Spor Ayakkabılar",
        UrunSayisi: 20,
        created_at: null,
        id: 4,
        parentId: 1,
        updated_at: null
    },
    {
        name: "kadin ayakkabisi",
        UrunSayisi: null,
        created_at: null,
        id: 5,
        parentId: null,
        updated_at: null
    },
    {
        name: "Klasik ayakkabıları",
        UrunSayisi: 20,
        created_at: null,
        id: 6,
        parentId: 5,
        updated_at: null
    },
    {
        name: "Spor Ayakkabılar",
        UrunSayisi: 20,
        created_at: null,
        id: 7,
        parentId: 5,
        updated_at: null
    },
    {
        name: "Topuklu ayakkabıları",
        UrunSayisi: 20,
        created_at: null,
        id: 8,
        parentId: 5,
        updated_at: null
    },
    {
        name: "cocuk ayakkabisi",
        UrunSayisi: null,
        created_at: null,
        id: 9,
        parentId: null,
        updated_at: null
    },
    {
        name: "Kışlık Ayakkabılar",
        UrunSayisi: 20,
        created_at: null,
        id: 10,
        parentId: 9,
        updated_at: null
    },
    {
        name: "Spor Ayakkabılar",
        UrunSayisi: 20,
        created_at: null,
        id: 11,
        parentId: 9,
        updated_at: null
    },
    {
        name: "Cizgi Karakterler",
        UrunSayisi: 20,
        created_at: null,
        id: 12,
        parentId: 9,
        updated_at: null
    },
    {
        name: "sandalet yazılık ",
        UrunSayisi: 20,
        created_at: null,
        id: 13,
        parentId: 1,
        updated_at: null
    }
];

const total = menus.reduce((acc, menus) => {
    let key = menus['parentId'];
    if(!acc[key]){
        acc[key] = [];
    }
    acc[key].push(menus.id);

    return acc;
}, {}) //CHANGE: Make the initial "sum" be the object with each key with a zero value

//return array with summed values {dry:solution_cost_dry, wet:solution_cost_wet  }



console.log(total);