@extends('MasterHead')
@section('body')
    <div class="hero-wrap js-fullheight" style="background-image: url('asset_sementara/images/index.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-9 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><strong>Invest<br></strong>with Us</h1>
            <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Invest for your future with us</p>
        </div>
      </div>
    </div>

    <section class="ftco-section services-section bg-light">
      <div class="container">
        <div class="row d-flex">
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-guarantee"></span></div></div>
              <div class="media-body p-2 mt-2">
                <h3 class="heading mb-3">Best Price Guarantee</h3>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-like"></span></div></div>
              <div class="media-body p-2 mt-2">
                <h3 class="heading mb-3">Many Investor Love Us</h3>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-detective"></span></div></div>
              <div class="media-body p-2 mt-2">
                <h3 class="heading mb-3">Best Investment Company</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
	</section>
    {{-- <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/bg_1.jpg);">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
            <h2 class="mb-4">Some fun facts</h2>
          </div>
        </div>
    		<div class="row justify-content-center">
    			<div class="col-md-10">
		    		<div class="row">
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="1000">0</strong>
		                <span>Happy Customers</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="30">0</strong>
		                <span>Destination Places</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="750">0</strong>
		                <span>Loyal Customer</span>
		              </div>
		            </div>
				  </div>
				  <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="156">0</strong>
		                <span>Lovely Exploration</span>
		              </div>
		            </div>
		          </div>
		        </div>
	        </div>
        </div>
    	</div>
    </section>
	<section class="ftco-section bg-light">
		<div class="container">
		  <div class="row justify-content-start mb-5 pb-3">
			<div class="col-md-7 heading-section ftco-animate">
			  <span class="subheading">Get to Know</span>
			  <h2><strong>Holyland</strong> Blog</h2>
			</div>
		  </div>
		  <div class="row d-flex">
			<div class="col-md-3 d-flex ftco-animate">
			  <div class="blog-entry align-self-stretch">
				<a href="blog-single.html" class="block-20" style="background-image: url('asset_sementara/images/blog.jpg');">
				</a>
				<div class="text p-4 d-block">
					<span class="tag">Ziarah Zaman Dahulu</span>
				  <h3 class="heading mt-3">Mengenal dan Memahami apa itu perjalanan Ziarah dan maknanya</h3>
				  <div class="meta mb-3">
					<div><a href="#">5 Oktober 2020</a></div>
					<div><a href="#">Admin</a></div>
					<button type="submit" class="btn btn-info"><a href="blog-single">Read More...</a></button>
				  </div>
				</div>
			  </div>
			</div>
			<div class="col-md-3 d-flex ftco-animate">
			  <div class="blog-entry align-self-stretch">
				<a href="blog-single.html" class="block-20" style="background-image: url('asset_sementara/images/blog2.jpg');">
				</a>
				<div class="text p-4">
					<span class="tag">Peta Penemuan Ladang Gas di Laut Mediterania Timur</span>
				  <h3 class="heading mt-3">Tanah Perjanjian yang berlimpah susu dan madunya serta lautnya yang berlimpah gas alam...</h3>
				  <div class="meta mb-3">
					<div><a href="#">17 Oktober 2020</a></div>
					<div><a href="#">Admin</a></div>
					<button type="submit" class="btn btn-info"><a href="blog-single2">Read More...</a></button>
				  </div>
				</div>
			  </div>
			</div>
			<div class="col-md-3 d-flex ftco-animate">
			  <div class="blog-entry align-self-stretch">
				<a href="blog-single.html" class="block-20" style="background-image: url('asset_sementara/images/blog3.jpg');">
				</a>
				<div class="text p-4">
					<span class="tag">Keluaran 20:13</span>
				  <h3 class="heading mt-3">Kesakralan Pernikahan dalam Perintah Ketujuh Hukum Tuhan</h3>
				  <div class="meta mb-3">
					<div><a href="#">21 Oktober 2020</a></div>
					<div><a href="#">Admin</a></div>
					<button type="submit" class="btn btn-info"><a href="blog-single3">Read More...</a></button>
				  </div>
				</div>
			  </div>
			</div>
			<div class="col-md-3 d-flex ftco-animate">
			  <div class="blog-entry align-self-stretch">
				<a href="blog-single.html" class="block-20" style="background-image: url('asset_sementara/images/blog4.jpg');">
				</a>
				<div class="text p-4">
					<span class="tag">Mazmur 119:67, 1Korintus 10:13, Kolose 2:7</span>
				  <h3 class="heading mt-3"><a href="#">Bagaikan Pohon Kurma</a></h3>
				  <div class="meta mb-3">
					<div><a href="#">10 November 2020</a></div>
					<div><a href="#">Admin</a></div>
					<button type="submit" class="btn btn-info"><a href="blog-single4">Read More...</a></button>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </section> --}}

    {{-- <section class="ftco-section testimony-section bg-light">
      <div class="container">
        <div class="row justify-content-start">
          <div class="col-md-5 heading-section ftco-animate">
            <h2 class="mb-4 pb-3"><strong>Mengapa</strong> Pack & Go Tours?</h2>
            <p>Pack & Go adalah pelopos ziarah wisata rohani yang sudah berdiri sejak September 2019 dan tetap konsisten hingga sekarang.Kami hadir secara profesional untuk memenuhi kebutuhan wisata rohani bagi Anda dan keluarga. Harga yang terjangkau serta mengumumkan service yang memuaskan.</p>
            <p>Penawaran paket wisata rohani terbaru dengan memberikan potongan harga menarik. Perjalanan nyaman Anda akan selali ditemani Tour Leader berpengalaman dan Romo Pembimbing Rohani.</p>
          </div>
					<div class="col-md-1"></div>
          <div class="col-md-6 heading-section ftco-animate">
          	<span class="subheading">Testimony</span>
            <h2 class="mb-4 pb-3"><strong>Our</strong> Guests Says</h2>
          	<div class="row ftco-animate">
		          <div class="col-md-12">
		            <div class="carousel-testimony owl-carousel">
		              <div class="item">
		                <div class="testimony-wrap d-flex">
		                  <div class="user-img mb-5" style="background-image: url(images/testi.png)">
		                    <span class="quote d-flex align-items-center justify-content-center">
		                      <i class="icon-quote-left"></i>
		                    </span>
		                  </div>
		                  <div class="text ml-md-4">
		                    <p class="mb-5">Kesan saya mengikuti ziarah ini sangat terharu sekali karena akhirnya impian saya untuk ke Lourder terwujud. Untungnya saya memilih travel yang terpat karena selama perjalanan dari berangka hingga pulang selalu diurus dengan baik.
								Thanks Pray&Go!GBU
							</p>
		                    <p class="name">Gracielo Justine</p>
		                    <span class="position">Guest From Pasuruan, jawa Timur</span>
		                  </div>
		                </div>
		              </div>
		              <div class="item">
		                <div class="testimony-wrap d-flex">
		                  <div class="user-img mb-5" style="background-image: url(images/testi.png)">
		                    <span class="quote d-flex align-items-center justify-content-center">
		                      <i class="icon-quote-left"></i>
		                    </span>
		                  </div>
		                  <div class="text ml-md-4">
		                    <p class="mb-5">Ini adalah tour ziarah yang pertama bagi saya dan sangat memuaskan,pelayanan Pack&Go cukup baik, mulai dari pengurusan VISA,keberangkatan dan kemarin pun tetap dibantu saat kepungan ke tujuan masing - masing.</p>
		                    <p class="name">David Suwignyo</p>
		                    <span class="position">Guest from Suarabaya, jawa Timur</span>
		                  </div>
		                </div>
		              </div>
		              <div class="item">
		                <div class="testimony-wrap d-flex">
		                  <div class="user-img mb-5" style="background-image: url(images/testi.png)">
		                    <span class="quote d-flex align-items-center justify-content-center">
		                      <i class="icon-quote-left"></i>
		                    </span>
		                  </div>
		                  <div class="text ml-md-4">
		                    <p class="mb-5">Tour Leader Renata cukup aktif. Kelompok 1 group sangat kompak.Manajemenya bagus sehingga kami bisa misa setiap hari di kapel Basilica dan Katedral Roma(3 tempat berbeda),Monaco,Lourdes(2 tempat),Belanda dengan jadwal yang terprogram sangat rapi.</p>
		                    <p class="name">Charles Junio</p>
		                    <span class="position">Guest from Bali,NTB</span>
		                  </div>
		                </div>
		              </div>
		            </div>
		          </div>
		        </div>
          </div>
        </div>
      </div>
    </section> --}}
	<section class="ftco-section-parallax">
      <div class="parallax-img d-flex align-items-center">
        <div class="container">
          <div class="row d-flex justify-content-center">
			<div class="col-12 text-center heading-section heading-section-white ftco-animate">
				<h2>Our Invest Package</h2>
			</div>
			@foreach ($dataPaket as $item )
				<div class="card m-3" style="width: 18rem;">
					<img src={{asset($item->gambar_paket)}} class="card-img-top" alt="..." height="200px" width="150px">
					<div class="card-body">
						<h5 class="card-title">{{$item->nama_paket}} </h5>
						<p class="card-text">Minimum Invest : Rp. <span class="d-none minimInvest" value={{$item->minimal_investasi}}></span>{{number_format($item->minimal_investasi)}}<br>
							Return : {{$item->presentase_profit}}% <br>
							Duration : {{$item->durasi_kontrak}} Months
						</p>
						<button type="button" class="btn btn-primary btnInvest" value={{$item->id_paket}} id="btnInvest{{$item->id_paket}}" minimInvest="{{$item->minimal_investasi}}">Invest</button>
						<div class="input-invest d-none" id="inputInvest{{$item->id_paket}}">
							<form class="form-horizontal style-form" method="POST" action="/invest">
								@csrf
								<input type="hidden" name="id-paket" value="">
								<div class="form-group">
									<label class="control-label">Invest Amount</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">Rp</div>
										</div>
										<input type="text" autocomplete="off" class="form-control" name="jumlahwithdraw" id="jumlahwithdraw"  value='{{old('jumlahwithdraw')}}' min={{$item->minimal_investasi}}  required>                                
									</div>
									<div class="mt-1">
										<button type="submit" class="btn btn-success">Submit</button>
										<button type="button" class="btn btn-danger btn-cancel" value={{$item->id_paket}}>cancel</button>
									</div>
									
								</div>							
							</form>
						</div>						
					</div>
				</div>
			@endforeach
          </div>
        </div>
      </div>
	  <input type="hidden" id="saldoCust" value={{Session::get("custLog")["saldo"]}}>	  
	  <form class="form-horizontal style-form d-none" method="POST" action="/invest" id="formInvest">
		@csrf
			<div class="form-group">
				<label class="col-4 control-label">Jumlah Investasi</label>
				<div class="col-12">
					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text">Rp</div>
						</div>
						<input type="hidden" class="form-control" name="idPaketInput" id="idPaketInput" value=""  required>
						<input type="hidden" class="form-control" name="jumlahInvest" id="jumlahInvest" value=""  required>
					</div>
				</div>
			</div>
		</form>`
    </section>
	@push('js')
	<script>		
		var idbutton="";
		var idDiv="inputInvest";
		$(document).ready(function(){
			var saldo=$('#saldoCust').val();
			console.log(saldo);
			const maximumValueWithdrawal = saldo
			const autoNumericOptions = {
				digitGroupSeparator        : '.',
				decimalCharacter           : ',',
				decimalCharacterAlternative: '.',
				currencySymbolPlacement    : AutoNumeric.options.currencySymbolPlacement.prefix,
				roundingMethod             : AutoNumeric.options.roundingMethod.halfUpSymmetric,
				minimumValue               : 0,
				wheelStep                  : 1000,
				decimalPlaces              : 0
			};     
			$('.btnInvest').on('click',function(){	
				$('#idPaketInput').val($(this).val());
				console.log(`minim invest ${$(this).attr('minimInvest')} , saldo ${saldo}`);
				var minimInvest=$(this).attr('minimInvest');
				if(parseInt(saldo) < parseInt(minimInvest)){
					Swal.fire(
						'Error!',
						'Saldo Anda tidak mencukupi minimal investasi',
						'error',
					);
				}	
				else{
					Swal.fire({
						title: 'Invest',
						image: '',
						width:'50%',
						html: `<div class="form-group">
									<div>
										<p class="h5"><strong>Paket 1</strong></p>										
									</div>
									<label class="col-4 control-label">Jumlah Investasi</label>
									<div class="col-12">
										<div class="input-group">
											<div class="input-group-prepend">
												<div class="input-group-text">Rp</div>
											</div>
											<input type="text" class="form-control" name="jumlahInvestInput" id="jumlahInvestInput"  required>
										</div>
									</div>
								</div>`,
						confirmButtonText: 'Invest',
						focusConfirm: false,
						preConfirm: () => {
							const investInput = Swal.getPopup().querySelector('#jumlahInvestInput').value		
							var investSplit= investInput.split('.');
							var investDepan=investSplit[0];
							var ctrpangkat=0;
							var invest= 0;
							if(investSplit.length>1){															
								for (let i = investSplit.length-1; i >= 0; i--) {
									var temp=investSplit[i]*(Math.pow(10,ctrpangkat*3));
									// console.log(temp);
                					ctrpangkat++;
                					invest+=temp;									
								}
							}
							else{
								invest=parseInt(investSplit[0]);            
							}
							console.log(`invest : ${invest} - Saldo : ${saldo} - minimInvest : ${minimInvest}`);
							if (invest > saldo) {
								Swal.showValidationMessage(`Saldo tidak mencukupi !<br> Sisa Saldo Anda saldo = Rp. ${saldo}`)
							}
							else if(invest < minimInvest){
								Swal.showValidationMessage(`Minimal investasi untuk paket ini adalah Rp.${(minimInvest)}`)
							}
							return { invest: invest }
						}
						}).then((result) => {
							$('#jumlahInvest').val(result.value.invest);
							console.log($('idPaketInput').val());
							console.log($('jumlahInvest').val());
							Swal.fire({								
								title: 'Are you sure?',
								text: `Anda Akan Investasi sebesar Rp.${result.value.invest}`,
								// text: `Anda Akan Investasi sebesar Rp.${result.value.invest} ----- ${$('#idPaketInput').val()} ---------  ${$('#jumlahInvest').val()}`,
								html:``,
								icon: 'warning',
								showCancelButton: true,
								confirmButtonColor: '#3085d6',
								cancelButtonColor: '#d33',
								confirmButtonText: 'Ya saya yakin'
								}).then((result) => {
								if (result.isConfirmed) {
									Swal.fire(
									'Berhasil!',
									'Anda telah melakukan investasi',
									'success'
									).then(function(){
										$('#formInvest').submit();
									});  ;
									
								}
								
							})
						// Swal.fire(`
						// 	Login: ${result.value.login}
						// 	Password: ${result.value.password}
						// `.trim())
					})			
					new AutoNumeric(document.getElementById('jumlahInvestInput'),$(this).attr('minimInvest'), autoNumericOptions);	
					// idbutton=$(this).val();
					// idDiv="inputInvest"+idbutton;
					// var div=document.getElementById(idDiv);
					// if(div.classList.contains("d-none")){
					// 	$(this).html("Cancel")
					// 	$(this).addClass('d-none')
					// 	$(div).fadeIn();		
					// 	$(div).removeClass('d-none')
					// }
					// else{
					// 	$(this).removeClass('d-none')
					// 	$(this).html("Invest")
					// 	$(div).fadeOut();		
					// 	$(div).addClass('d-none')
					// }	
				}											
            });      
					
			$('.btn-cancel').on('click',function(){
				
            	// console.log($(this));
				idbutton=$(this).val();
				var btnInvest=document.getElementById("btnInvest"+idbutton);
				idDiv="inputInvest"+idbutton;
				var div=document.getElementById(idDiv);
				if(div.classList.contains("d-none")){
					$(btnInvest).html("Cancel")
					$(btnInvest).addClass('d-none')
					$(div).fadeIn();		
					$(div).removeClass('d-none')
				}
				else{					
					$(btnInvest).fadeIn();
					$(btnInvest).removeClass('d-none')
					$(btnInvest).html("Invest")
					$(div).fadeOut();		
					$(div).addClass('d-none')
				}
				console.log($(div));							
            });           
			
		});

	</script>
	@endpush
    @endsection
