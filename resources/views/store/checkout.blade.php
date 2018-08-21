@extends('layout.default')
@section('content')
    <h2 class="header">Checkout</h2>


    <ul class="tabs tabs-fixed-width">
        <li class="tab"><a href="#step1">Suas informações</a></li>
        <li class="tab"><a href="#step2">Entrega</a></li>
        <li class="tab"><a href="#step3">Pagemento</a></li>
    </ul>

    <form action="/checkout/{{ $id }}" method="POST" id="form">
        @csrf

        <input type="hidden" name="itemId1" value="0001">
        <input type="hidden" name="itemDescription1" value="Produto PagSeguroI">
        <input type="hidden" name="itemAmount1" value="250.00">
        <input type="hidden" name="itemQuantity1" value="2">



        {{--Informações do usuário--}}
        <div id="step1">

            <input type="hidden" name="senderHash" id="senderHash">

            <p>Preencha suas informações</p>
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" id="senderName" name="senderName">
                    <label for="senderName">Nome completo</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <input type="text" id="senderCPF" name="senderCPF">
                    <label for="senderCPF">CPF</label>
                </div>
                <div class="input-field col s6">
                    <input type="text" id="senderEmail" name="senderEmail">
                    <label for="senderEmail">Email</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6 offset-s3">
                    <input type="text" id="senderPhone" name="senderPhone">
                    <label for="senderPhone">Telefone</label>
                </div>
            </div>
        </div>

        {{--Informações local de entrega do produto--}}
        <div id="step2">
            <p> Informe os dados para entrega</p>

            <div class="row">
                <div class="input-field col s6">
                    <input type="text" id="shippingAddressPostalCode" name="shippingAddressPostalCode">
                    <label for="shippingAddressPostalCode">CEP</label>
                </div>
                <div class="input-field col s6">
                    <input type="text" id="shippingAddressStreet" name="shippingAddressStreet">
                    <label for="shippingAddressStreet">Logradouro</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <input type="text" id="shippingAddressNumber" name="shippingAddressNumber">
                    <label for="shippingAddressNumber">Número</label>
                </div>
                <div class="input-field col s6">
                    <input type="text" id="shippingAddressComplement" name="shippingAddressComplement">
                    <label for="shippingAddressComplement">Complemento</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <input type="text" id="shippingAddressDistrict" name="shippingAddressDistrict">
                    <label for="shippingAddressDistrict">Bairro</label>
                </div>
                <div class="input-field col s6">
                    <input type="text" id="shippingAddressCity" name="shippingAddressCity">
                    <label for="shippingAddressCity">Cidade</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <input type="text" id="shippingAddressState" name="shippingAddressState">
                    <label for="shippingAddressState">Estado</label>
                </div>
                <div class="input-field col s6">
                    {{--<input type="text" id="shippingType" name="shippingType">--}}
                    <input type="hidden" name="shippingCost" value="21.50">
                    <select name="shippingType" id="shippingType" class="browser-default">
                        <option disabled selected value="">Forma de entrega</option>
                        <option value="1"> Encomenda normal via (PAC)</option>
                        <option value="2"> SEDEX</option>
                        <option value="3"> Tipo de frete não especificado </option>
                    </select>
                    {{--<label for="shippingType">Forma de entrega</label>--}}
                </div>
            </div>
        </div>

        {{--envia formulario pro pagseguro--}}
        <div id="step3">
            <p> Preencha os dados para pagamento</p>

            <input type="hidden" name="creditCardToken" id="creditCardToken">
            <input type="hidden" name="installmentValue" id="installmentValue">

            <div class="row">
                <div class="input-field col s9">
                    <div class="col s10">
                        <input type="text" id="cardNumber">
                        <label for="cardNumber">Número do cartão</label>
                    </div>
                    <div class="col s2">
                        <div id="card_brand"></div>
                    </div>

                </div>
                <div class="input-field col s3">
                    <div class="col s12">
                        <input type="text" id="cvv">
                        <label for="card">Código de segurança</label>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="input-field col s4">
                    <input type="text" id="expirationMonth">
                    <label for="card">Mês de vencimento</label>
                </div>
                <div class="input-field col s4">
                    <input type="text" id="expirationYear">
                    <label for="experationYear">Ano de vencimento</label>
                </div>
                <div class="input-field col s4">
                    <select name="installmentQuantity" id="installmentQuantity" class="browser-default">
                        <option disabled selected> Parcelamento </option>
                    </select>
                </div>
            </div>

            <p> Dados do dono do cartão</p>

            <p>
                <label>
                    <input type="checkbox" id="copy_from_me">
                    <span>Copiar seus dados</span>
                </label>
            </p>


            <div id="holder_data">
                @include('store.user_data')
            </div>

            <div class="row">
                <div class="input-field col s3">
                    <input type="text" id="creditCarHolderBirthDate" name="creditCarHolderBirthDate">
                    <label for="creditCarHolderBirthDate">Data de nascimento</label>
                </div>
            </div>

            <p> Endereço da fatura </p>

            <p>
                <label>
                    <input type="checkbox" id="copy_from_shipping">
                    <span> Copiar do endereço de entrega</span>
                </label>
            </p>

            <div id="shipping_data">
                @include('store.shipping_data')
            </div>


            <div class="row">
                <div class="input-field col s12">
                    <input type="submit" value="Pagar" class="btn">
                </div>
            </div>
        </div>
    </form>

    <div id="payment_methods" class="center-align">

    </div>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

    <script>
        $(document).ready(function(){
            $('.tabs').tabs();
        });
    </script>


@endsection

@section('script')

    <script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>


    <script>

        const paymentData = {
            brand: '',
            amount: '{{ $amount }}'
        };

        PagSeguroDirectPayment.setSessionId('{{ $session }}');

        pagSeguro.getPaymentMethods(paymentData.amount)
            .then(function (urls) {
                let html = '';
                urls.forEach(function (url) {
                    html += '<img src ="' + url +'" class="credit_card" >'
                });
                $('#payment_methods').html(html);
            });

        $('#senderName').on('change', function () {
            pagSeguro.getSenderHash().then( function (data) {
                $('#senderHash').val(data);
            })
        })

        $('#shippingAddressPostalCode').on('blur', function () {
            let cep = $(this).val();

            if(cep.length == 8) {
                $.get('https://viacep.com.br/ws/' + cep +'/json')
                    .then(function (res) {
                        $('#shippingAddressDistrict').val(res.bairro);
                        $('#shippingAddressState').val(res.uf);
                        $('#shippingAddressStreet').val(res.logradouro);
                        $('#shippingAddressCity').val(res.localidade);
                        M.updateTextFields();
                    });
            }
        })

        $('#cardNumber').on('keyup', function() {
            if ($(this).val().length >= 6) {
                let bin = $(this).val();
                pagSeguro.getBrand(bin)
                    .then(function (res) {
                        paymentData.brand = res.result.brand.name;
                        $('#card_brand').html('<img src="' + res.url + '" class="credit_card">')
                        return pagSeguro.getInstallments(paymentData.amount, paymentData.brand);
                    })
                    .then(function(res) {
                        let html = '';
                        res.forEach(function (item) {
                            console.log(item);
                            html += '<option value="' + item.quantity + '">' + item.quantity + 'x R$' + item.installmentAmount + ' - total R$' + item.totalAmount + '</option>'
                        });
                        $('#installmentQuantity').html(html);
                        $('#installmentValue').val(res[0].installmentAmount);
                        $('#installmentQuantity').on('change', function () {
                            let value = res[$('#installmentQuantity').val() - 1].installmentAmount;
                            $('#installmentValue').val(value);
                        });
                    })
            }
        });


        $('#form').on('submit', function (e) {
            e.preventDefault();
            let params = {
                cardNumber : $('#cardNumber').val(),
                cvv : $('#cvv').val(),
                cardNumber : $('#cardNumber').val(),
                expirationMonth : $('#expirationMonth').val(),
                expirationYear : $('#expirationYear').val(),
                brand: paymentData.brand
            }
            pagSeguro.createCardToken(params)
                .then(function (token) {
                    $('#creditCardToken').val(token);
                    let url = $('#form').attr('action');
                    let data = $('#form').serialize();
                    $.post(url, data).then(function () {
                        window.location = '/checkout/success';
                    });
                })
        })


        let toogle = function (element, verification, callbackShow, callbackHide) {
            if(!verification.is(':checked')){
                $(element).show();
                callbackShow();
            }else{
                $(element).hide();
                callbackHide();
            }
        }

        let holderShow = function () {
            $('#creditCardHolderName').val('');
            $('#creditCardHolderCPF').val('');
            $('#creditCardHolderPhone').val('');
        }

        let holderHide = function () {
            $('#creditCardHolderName').val($('#senderName').val());
            $('#creditCardHolderCPF').val($('#senderCPF').val());
            $('#creditCardHolderPhone').val($('#senderPhone').val());
            M.updateTextFields();

        }

        let shippingShow = function () {
            $('#billingAddressPostalCode').val('');
            $('#billingAddressStreet').val('');
            $('#billingAddressNumber').val('');
            $('#billingAddressComplement').val('');
            $('#billingAddressDistrict').val('');
            $('#billingAddressCity').val('');
            $('#billingAddressState').val('');
        }

        let shippingHide = function () {
            $('#billingAddressPostalCode').val($('#shippingAddressPostalCode').val());
            $('#billingAddressStreet').val($('#shippingAddressStreet').val());
            $('#billingAddressNumber').val($('#shippingAddressNumber').val());
            $('#billingAddressComplement').val($('#shippingAddressComplement').val());
            $('#billingAddressDistrict').val($('#shippingAddressDistrict').val());
            $('#billingAddressCity').val($('#shippingAddressCity').val());
            $('#billingAddressState').val($('#shippingAddressState').val());
        }


        toogle('#holder_data', $(this), holderShow, holderHide)
        toogle('#shipping_data', $(this), shippingShow, shippingHide)

        $('#copy_from_me').on('change', function () {
            toogle('#holder_data', $(this), holderShow, holderHide)
        })

        $('#copy_from_shipping').on('change', function () {
            toogle('#shipping_data', $(this), shippingShow, shippingHide)
        })

        M.updateTextFields();

    </script>
@endsection
