@extends('app.layout.layout')

@section('title')Colissend | Impressum @endsection

@section('stylesheets')
    <link rel="stylesheet" href="{{ mix('css/appController.css') }}">
@endsection

@section('app')

    <x-header page="page-howItWork" img="" title="Impressum"/>

    <div class="card-section">
        <div class="container">
            <div class="card-block bg-white mb30">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="section-title mb-0">
                            <div class="row border py-2 mb-2">
                                <h3 class="fw-bold">Colissend</h3>
                                <h4>Herreshagener Str. 6</h4>
                                <h4>51643 Gummersbach</h4>
                                <h4>Telefon: 017664901024</h4>
                                <h4>E-Mail: colissend@gmail.com</h4>
                            </div>
                            <div class="row border py-2">
                                <h3 class="fw-bold">Représenté par:</h3>
                                <h4>Directeur général: Claude Simo</h4>
                                <h4>Inscription au registre: </h4>
                                <h4>Inscrit au registre du commerce.</h4>
                                <h4>Tribunal d'enregistrement: 69869569023</h4>
                                <h4>Numéro d'identification de la taxe sur le chiffre d'affaires:</h4>
                                <h4>Numéro d'identification de la taxe sur le chiffre d'affaires conformément au §27a de la loi sur la taxe sur le chiffre d'affaires: 3743840975683</h4>
                            </div>
                            <div class="row border py-2 mb-2">
                                <h3 class="fw-bold">Remarque conformément à l'ordonnance sur le règlement en ligne des litiges</h3>
                               <p> Conformément à la législation en vigueur, nous sommes tenus d'informer les consommateurs de l'existence de la plateforme européenne de règlement en ligne des litiges, qui peut être utilisée pour résoudre les litiges sans passer par un tribunal. La Commission européenne est responsable de la mise en place de cette plateforme. La plateforme européenne de règlement en ligne des litiges se trouve ici : http://ec.europa.eu/odr. Notre adresse électronique est la suivante : quigo.aubled@gmail.com
                                   Nous attirons toutefois votre attention sur le fait que nous ne sommes pas disposés à participer à la procédure de règlement des litiges dans le cadre de la plateforme européenne de règlement des litiges en ligne. Pour nous contacter, veuillez utiliser notre e-mail et notre numéro de téléphone ci-dessus.</p>
                            </div>
                            <div class="row border py-2 mb-2">
                                <h3 class="fw-bold">Information conformément à la loi sur le règlement des litiges de consommation (VSBG)</h3>
                                <p>Nous ne sommes ni prêts ni obligés de participer à des procédures de règlement des litiges devant un organisme de conciliation des consommateurs.</p>
                            </div>
                            <div class="row border py-2 mb-2">
                                <h3 class="fw-bold">Disclaimer - informations juridiques</h3>
                                <p>§ 1 Avertissement sur le contenu Les contenus gratuits et librement accessibles de ce site web ont été élaborés avec le plus grand soin. Le fournisseur de ce site web ne garantit toutefois pas l'exactitude et l'actualité des conseils et des informations journalistiques gratuits et librement accessibles mis à disposition. Les articles nommément désignés reflètent l'opinion de leur auteur et pas toujours celle du fournisseur. La seule consultation des contenus gratuits et librement accessibles ne donne lieu à aucune relation contractuelle entre l'utilisateur et le fournisseur, la volonté d'engagement juridique du fournisseur faisant défaut à cet égard.</p>
                            </div>
                            <div class="row border py-2 mb-2">
                                <h3 class="fw-bold">§ 2 Liens externes</h3>
                                <p>Ce site web contient des liens vers des sites web de tiers ("liens externes"). Ces sites sont soumis à la responsabilité responsabilité de leurs exploitants respectifs. Lors de la première mise en place des liens externes, le fournisseur a vérifié si les contenus externes présentaient d'éventuelles violations de la loi. Aucune violation de la loi n'a été constatée à ce moment-là. Le fournisseur n'a aucune influence sur la conception actuelle et future et sur les contenus des pages liées. La mise en place de liens externes ne signifie pas que le fournisseur s'approprie les contenus se trouvant derrière le renvoi ou le lien. Un contrôle permanent des liens externes ne peut être exigé du fournisseur sans indication concrète de violations de la loi. Toutefois, dès la prise de connaissance d'une violation de la loi, les liens externes en question seront immédiatement supprimés.</p>
                            </div>
                            <div class="row border py-2 mb-2">
                                <h3 class="fw-bold">§ 3 Droits d'auteur et droits voisins</h3>
                                <p>Les contenus publiés sur ce site Internet sont soumis au droit d'auteur et aux droits voisins allemands. Toute utilisation non autorisée par le droit d'auteur et les droits voisins allemands requiert l'accord écrit préalable du fournisseur ou du détenteur des droits. Cela s'applique en particulier à la reproduction, au traitement, à la traduction, à l'enregistrement, au traitement ou à la restitution de contenus dans des bases de données ou d'autres médias et systèmes électroniques. Les contenus et les droits de tiers sont signalés comme tels. La reproduction ou la transmission non autorisée de contenus individuels ou de pages complètes est interdite et punissable. Seule la réalisation de copies et de téléchargements pour un usage personnel, privé et non commercial est autorisée.
                                    La représentation de ce site web dans des cadres étrangers n'est autorisée qu'avec une permission écrite.</p>
                            </div>
                            <div class="row border py-2 mb-2">
                                <h3 class="fw-bold">§ 4 Conditions d'utilisation particulières</h3>
                                <p>
                                    Dans la mesure où des conditions particulières pour certaines utilisations de ce site web diffèrent des paragraphes susmentionnés, il en est fait expressément mention à l'endroit correspondant. Dans ce cas, les conditions d'utilisation particulières s'appliquent au cas par cas.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
