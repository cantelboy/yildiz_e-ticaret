<template>
     <div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title ">Site Ayarları</h4>
          <p class="card-category">Yapmış olduğunuz değişikleri lütfen kontrol ediniz..!</p>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <form id="SiteAyarForm">
              <table class="table"  v-for="item in 10" :key="item">
              <thead class=" text-primary">
            
              </thead>
              <tbody>
                <tr> 
                  <td>
                     Key
                  </td>
                  <td>
                   Val
                  </td>
                  <td>
                  Key
                  </td>
                  <td>
                   Val
                  </td>
                  <td>
                    Key
                  </td>
                  <td>
                   Val
                  </td>
                </tr>
              </tbody>
            </table>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
 </div>


</template>

<script>


export default {
    data(){
        return {
            CustomersData:[]

        }
    },
    created(){
        axios.get('/api/admin/site-uyeler')
    .then(response=>{
     
       this.CustomersData.push(response.data);
    })
        
    },


}

</script>

<style>

</style>


	<tr height="80">
				<td colspan="2" style="border-bottom: 1px dashed #CCCCCC;" valign="top"><table width="750" align="right" border="0" cellpadding="0" cellspacing="0">
					<tr height="30">
						<td width="85"><b>Adı Soyadı</b></td>
						<td width="10"><b>:</b></td>
						<td width="150"><?php echo DonusumleriGeriDondur($Uyeler["IsimSoyisim"]); ?></td>
						<td width="90"><b>E-Mail</b></td>
						<td width="10"><b>:</b></td>
						<td width="200"><?php echo DonusumleriGeriDondur($Uyeler["EmailAdresi"]); ?></td>
						<td width="70"><b>Telefon</b></td>
						<td width="10"><b>:</b></td>
						<td width="95"><?php echo DonusumleriGeriDondur($Uyeler["TelefonNumarasi"]); ?></td>
					</tr>
					<tr height="30">
						<td><b>Cinsiyet</b></td>
						<td><b>:</b></td>
						<td><?php echo DonusumleriGeriDondur($Uyeler["Cinsiyet"]); ?></td>
						<td><b>Kayıt Tarihi</b></td>
						<td><b>:</b></td>
						<td><?php echo  TarihBul(DonusumleriGeriDondur($Uyeler["KayitTarihi"])); ?></td>
						<td><b>Kayıt IP</b></td>
						<td><b>:</b></td>
						<td><?php echo DonusumleriGeriDondur($Uyeler["KayitIpAdresi"]); ?></td>
					</tr>
					<tr>
						<td colspan="9" align="right"><table width="95" align="right" border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td width="40">&nbsp;</td>
								<td width="25" valign="top" align="left"><a href="index.php?SKD=0&SKI=84&ID=<?php echo DonusumleriGeriDondur($Uyeler["id"]); ?>"><img src="../Resimler/Sil20x20.png" border="0" style="margin-top: 5px;"></a></td>
								<td width="30" align="left"><a href="index.php?SKD=0&SKI=84&ID=<?php echo DonusumleriGeriDondur($Uyeler["id"]); ?>" style="color: #FF0000; text-decoration: none;">Sil</a></td>
							</tr>
						</table></td>
					</tr>
				</table></td>
			</tr>








    <div>
        <h1>Costumer Lists</h1>
        <div class="container">
         <ul  v-for="(customer, index) in CustomersData[0]" :key="index">
            <li>{{customer.id}}</li>
            <li>{{customer.EmailAdresi}}</li>
            <li>{{customer.Sifre}}</li>
            <li>{{customer.TelefonNumarasi}}</li>
            <li>{{customer.Cinsiyet}}</li>
            <li>{{customer.Durumu}}</li>
            <li>{{customer.SilinmeDurumu}}</li>
            <li>{{customer.KayitTarihi}}</li>
            <li>{{customer.KayitIpAdresi}}</li>
            <li>{{customer.AktivasyonKodu}}</li>
      
        </ul>
        </div>
    </div>