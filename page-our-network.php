<?php get_header('our-network'); ?>
  <?php if(get_field('staff_section_intro')): ?>
    <div class="section-intro">
      <div class="container">
        <?php the_field('staff_section_intro'); ?>
      </div>
    </div>
  <?php endif; ?>
    <div class="container">
      <ul id="filter-nav" class="nav nav-tabs">
        <li class="active"><a href="#" class="filter" data-filter=".all">All Staff</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Team</a>
          <ul class="dropdown-menu">
            <?php
              $teams = get_terms('team', array('hide_empty' => 0));
              foreach($teams as $team){
                echo '<li><a href="#" class="filter" data-filter=".' . $team->slug . '">' . $team->name . '</a></li>';
              }
            ?>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Regional Expertise</a>
          <ul class="dropdown-menu">
            <?php
              $regional_expertise = get_terms('regional_expertise', array('hide_empty' => 0));
              foreach($regional_expertise as $region){
                echo '<li><a href="#" class="filter" data-filter=".' . $region->slug . '">' . $region->name . '</a></li>';
              }
            ?>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Languages</a>
          <ul class="dropdown-menu">
            <?php
              $languages = get_terms('language', array('hide_empty' => 0));
              foreach($languages as $language){
                echo '<li><a href="#" class="filter" data-filter=".' . $language->slug . '">' . $language->name . '</a></li>';
              }
            ?>
          </ul>
        </li>
      </ul>
      <div id="staff_grid" class="grid row">
        <!--<div class="grid-sizer col-xs-6 col-sm-3"></div>-->
        <div class="grid-item circle-card executive management middle-east-and-north-africa english">
          <a href="#" class="circle-card-content" data-details_name="David Jodice, PH.D." data-details_title="President & Chief Executive Officer" data-details_bio="<p>Dr. Jodice has led research teams on cross-national political instability and violence (Science Center Berlin), surveys in developing countries (Research Management Services) and full-service opinion, media and market research (D3 Systems, Inc.) from 1977 to 2015. He is the Founder and President of D3 Systems, a co-founder of full-service research companies in Afghanistan (ACSOR), Bosnia & Herzegovina (MIB) and Kenya (Infinite Insight). With Matthew Warshaw (also D3) and colleagues from Bulgaria (Kantcho Stoychev and Andrei Raichev) he has co-founded Research Control Solutions. A key driver for Dr. Jodice is capacity building - at home and abroad - at the individual, team, and company levels.</p>" data-staff_team="Management" data-staff_degrees="B.A. in History (Gordon College), M.A. and Ph.D. in Government (Harvard)" data-staff_languages="English" data-staff_countryexp="Afghanistan, Bosnia, Herzegovina, and Kenya">
            <img src="images/headshots/david-jodice.jpg" class="img-circle center-block" alt="David Jodice" />
            <h4>David A. Jodice, Ph.D.</h4>
            <p>President and Chief Executive Officer President and Chief Executive Officer</p>
          </a>
        </div>
        <div class="grid-item circle-card management administration the-americas-and-the-caribbean english spanish">
          <a href="#" class="circle-card-content" data-details_name="Member 2 Name" data-details_title="President & Chief Executive Officer" data-details_bio="<p>Dr. Jodice has led research teams on cross-national political instability and violence (Science Center Berlin), surveys in developing countries (Research Management Services) and full-service opinion, media and market research (D3 Systems, Inc.) from 1977 to 2015. He is the Founder and President of D3 Systems, a co-founder of full-service research companies in Afghanistan (ACSOR), Bosnia & Herzegovina (MIB) and Kenya (Infinite Insight). With Matthew Warshaw (also D3) and colleagues from Bulgaria (Kantcho Stoychev and Andrei Raichev) he has co-founded Research Control Solutions. A key driver for Dr. Jodice is capacity building - at home and abroad - at the individual, team, and company levels.</p>" data-staff_team="Management" data-staff_yearsexp="40" data-staff_degrees="B.A. in History (Gordon College), M.A. and Ph.D. in Government (Harvard)" data-staff_languages="English" data-staff_countryexp="Afghanistan, Bosnia">
            <img src="images/headshots/david-jodice.jpg" class="img-circle center-block" alt="David Jodice" />
            <h4>David A. Jodice, Ph.D.</h4>
            <p>President and Chief Executive Officer</p>
          </a>
        </div>
        <div class="grid-item circle-card analysts europe middle-east-and-north-africa pashto">
          <a href="#" class="circle-card-content" data-details_name="Member 3 Name" data-details_title="President & Chief Executive Officer"
            data-details_bio="<p>Dr. Jodice has led research teams on cross-national political instability and violence (Science Center Berlin), surveys in developing countries (Research Management Services) and full-service opinion, media and market research (D3 Systems, Inc.) from 1977 to 2015. He is the Founder and President of D3 Systems, a co-founder of full-service research companies in Afghanistan (ACSOR), Bosnia & Herzegovina (MIB) and Kenya (Infinite Insight). With Matthew Warshaw (also D3) and colleagues from Bulgaria (Kantcho Stoychev and Andrei Raichev) he has co-founded Research Control Solutions. A key driver for Dr. Jodice is capacity building - at home and abroad - at the individual, team, and company levels.</p>" data-staff_team="Management" data-staff_yearsexp="40" data-staff_degrees="B.A. in History (Gordon College), M.A. and Ph.D. in Government (Harvard)" data-staff_languages="English" data-staff_countryexp="Afghanistan, Bosnia, Herzegovina, and Kenya">
            <img src="images/headshots/david-jodice.jpg" class="img-circle center-block" alt="David Jodice" />
            <h4>David A. Jodice, Ph.D.</h4>
            <p>President and Chief Executive Officer</p>
          </a>
        </div>
        <div class="grid-item circle-card executive management middle-east-and-north-africa english">
          <a href="#" class="circle-card-content" data-details_name="Member 4 Name" data-details_title="President & Chief Executive Officer"
            data-details_bio="<p>Dr. Jodice has led research teams on cross-national political instability and violence (Science Center Berlin), surveys in developing countries (Research Management Services) and full-service opinion, media and market research (D3 Systems, Inc.) from 1977 to 2015. He is the Founder and President of D3 Systems, a co-founder of full-service research companies in Afghanistan (ACSOR), Bosnia & Herzegovina (MIB) and Kenya (Infinite Insight). With Matthew Warshaw (also D3) and colleagues from Bulgaria (Kantcho Stoychev and Andrei Raichev) he has co-founded Research Control Solutions. A key driver for Dr. Jodice is capacity building - at home and abroad - at the individual, team, and company levels.</p>" data-staff_team="Management" data-staff_yearsexp="40" data-staff_degrees="B.A. in History (Gordon College), M.A. and Ph.D. in Government (Harvard)" data-staff_languages="English" data-staff_countryexp="Afghanistan, Bosnia, Herzegovina, and Kenya">
            <img src="images/headshots/david-jodice.jpg" class="img-circle center-block" alt="David Jodice" />
            <h4>David A. Jodice, Ph.D.</h4>
            <p>President and Chief Executive Officer</p>
          </a>
        </div>
        <div class="grid-item circle-card executive management middle-east-and-north-africa english">
          <a href="#" class="circle-card-content" data-details_name="Member 5 Name" data-details_title="President & Chief Executive Officer"
            data-details_bio="<p>Dr. Jodice has led research teams on cross-national political instability and violence (Science Center Berlin), surveys in developing countries (Research Management Services) and full-service opinion, media and market research (D3 Systems, Inc.) from 1977 to 2015. He is the Founder and President of D3 Systems, a co-founder of full-service research companies in Afghanistan (ACSOR), Bosnia & Herzegovina (MIB) and Kenya (Infinite Insight). With Matthew Warshaw (also D3) and colleagues from Bulgaria (Kantcho Stoychev and Andrei Raichev) he has co-founded Research Control Solutions. A key driver for Dr. Jodice is capacity building - at home and abroad - at the individual, team, and company levels.</p>" data-staff_team="Management" data-staff_yearsexp="40" data-staff_degrees="B.A. in History (Gordon College), M.A. and Ph.D. in Government (Harvard)" data-staff_languages="English" data-staff_countryexp="Afghanistan, Bosnia, Herzegovina, and Kenya">
            <img src="images/headshots/david-jodice.jpg" class="img-circle center-block" alt="David Jodice" />
            <h4>David A. Jodice, Ph.D.</h4>
            <p>President and Chief Executive Officer</p>
          </a>
        </div>
        <div class="grid-item circle-card executive management middle-east-and-north-africa english">
          <a href="#" class="circle-card-content" data-details_name="Member 6 Name" data-details_title="President & Chief Executive Officer"
            data-details_bio="<p>Dr. Jodice has led research teams on cross-national political instability and violence (Science Center Berlin), surveys in developing countries (Research Management Services) and full-service opinion, media and market research (D3 Systems, Inc.) from 1977 to 2015. He is the Founder and President of D3 Systems, a co-founder of full-service research companies in Afghanistan (ACSOR), Bosnia & Herzegovina (MIB) and Kenya (Infinite Insight). With Matthew Warshaw (also D3) and colleagues from Bulgaria (Kantcho Stoychev and Andrei Raichev) he has co-founded Research Control Solutions. A key driver for Dr. Jodice is capacity building - at home and abroad - at the individual, team, and company levels.</p>" data-staff_team="Management" data-staff_yearsexp="40" data-staff_degrees="B.A. in History (Gordon College), M.A. and Ph.D. in Government (Harvard)" data-staff_languages="English" data-staff_countryexp="Afghanistan, Bosnia, Herzegovina, and Kenya">
            <img src="images/headshots/david-jodice.jpg" class="img-circle center-block" alt="David Jodice" />
            <h4>David A. Jodice, Ph.D.</h4>
            <p>President and Chief Executive Officer</p>
          </a>
        </div>
        <div class="grid-item circle-card executive management middle-east-and-north-africa english">
          <a href="#" class="circle-card-content" data-details_name="Member 7 Name" data-details_title="President & Chief Executive Officer"
            data-details_bio="<p>Dr. Jodice has led research teams on cross-national political instability and violence (Science Center Berlin), surveys in developing countries (Research Management Services) and full-service opinion, media and market research (D3 Systems, Inc.) from 1977 to 2015. He is the Founder and President of D3 Systems, a co-founder of full-service research companies in Afghanistan (ACSOR), Bosnia & Herzegovina (MIB) and Kenya (Infinite Insight). With Matthew Warshaw (also D3) and colleagues from Bulgaria (Kantcho Stoychev and Andrei Raichev) he has co-founded Research Control Solutions. A key driver for Dr. Jodice is capacity building - at home and abroad - at the individual, team, and company levels.</p>" data-staff_team="Management" data-staff_yearsexp="40" data-staff_degrees="B.A. in History (Gordon College), M.A. and Ph.D. in Government (Harvard)" data-staff_languages="English" data-staff_countryexp="Afghanistan, Bosnia, Herzegovina, and Kenya">
            <img src="images/headshots/david-jodice.jpg" class="img-circle center-block" alt="David Jodice" />
            <h4>David A. Jodice, Ph.D.</h4>
            <p>President and Chief Executive Officer</p>
          </a>
        </div>
        <div class="grid-item circle-card executive management middle-east-and-north-africa english">
          <a href="#" class="circle-card-content" data-details_name="Member 8 Name" data-details_title="President & Chief Executive Officer"
            data-details_bio="<p>Dr. Jodice has led research teams on cross-national political instability and violence (Science Center Berlin), surveys in developing countries (Research Management Services) and full-service opinion, media and market research (D3 Systems, Inc.) from 1977 to 2015. He is the Founder and President of D3 Systems, a co-founder of full-service research companies in Afghanistan (ACSOR), Bosnia & Herzegovina (MIB) and Kenya (Infinite Insight). With Matthew Warshaw (also D3) and colleagues from Bulgaria (Kantcho Stoychev and Andrei Raichev) he has co-founded Research Control Solutions. A key driver for Dr. Jodice is capacity building - at home and abroad - at the individual, team, and company levels.</p>" data-staff_team="Management" data-staff_yearsexp="40" data-staff_degrees="B.A. in History (Gordon College), M.A. and Ph.D. in Government (Harvard)" data-staff_languages="English" data-staff_countryexp="Afghanistan, Bosnia, Herzegovina, and Kenya">
            <img src="images/headshots/david-jodice.jpg" class="img-circle center-block" alt="David Jodice" />
            <h4>David A. Jodice, Ph.D.</h4>
            <p>President and Chief Executive Officer</p>
          </a>
        </div>
        <div class="grid-item circle-card executive management middle-east-and-north-africa english">
          <a href="#" class="circle-card-content" data-details_name="Member 9 Name" data-details_title="President & Chief Executive Officer"
            data-details_bio="<p>Dr. Jodice has led research teams on cross-national political instability and violence (Science Center Berlin), surveys in developing countries (Research Management Services) and full-service opinion, media and market research (D3 Systems, Inc.) from 1977 to 2015. He is the Founder and President of D3 Systems, a co-founder of full-service research companies in Afghanistan (ACSOR), Bosnia & Herzegovina (MIB) and Kenya (Infinite Insight). With Matthew Warshaw (also D3) and colleagues from Bulgaria (Kantcho Stoychev and Andrei Raichev) he has co-founded Research Control Solutions. A key driver for Dr. Jodice is capacity building - at home and abroad - at the individual, team, and company levels.</p>" data-staff_team="Management" data-staff_yearsexp="40" data-staff_degrees="B.A. in History (Gordon College), M.A. and Ph.D. in Government (Harvard)" data-staff_languages="English" data-staff_countryexp="Afghanistan, Bosnia, Herzegovina, and Kenya">
            <img src="images/headshots/david-jodice.jpg" class="img-circle center-block" alt="David Jodice" />
            <h4>David A. Jodice, Ph.D.</h4>
            <p>President and Chief Executive Officer</p>
          </a>
        </div>
        <div class="grid-item circle-card executive management middle-east-and-north-africa english">
          <a href="#" class="circle-card-content" data-details_name="Member 10 Name" data-details_title="President & Chief Executive Officer"
            data-details_bio="<p>Dr. Jodice has led research teams on cross-national political instability and violence (Science Center Berlin), surveys in developing countries (Research Management Services) and full-service opinion, media and market research (D3 Systems, Inc.) from 1977 to 2015. He is the Founder and President of D3 Systems, a co-founder of full-service research companies in Afghanistan (ACSOR), Bosnia & Herzegovina (MIB) and Kenya (Infinite Insight). With Matthew Warshaw (also D3) and colleagues from Bulgaria (Kantcho Stoychev and Andrei Raichev) he has co-founded Research Control Solutions. A key driver for Dr. Jodice is capacity building - at home and abroad - at the individual, team, and company levels.</p>" data-staff_team="Management" data-staff_yearsexp="40" data-staff_degrees="B.A. in History (Gordon College), M.A. and Ph.D. in Government (Harvard)" data-staff_languages="English" data-staff_countryexp="Afghanistan, Bosnia, Herzegovina, and Kenya">
            <img src="images/headshots/david-jodice.jpg" class="img-circle center-block" alt="David Jodice" />
            <h4>David A. Jodice, Ph.D.</h4>
            <p>President and Chief Executive Officer</p>
          </a>
        </div>
        <div class="grid-item circle-card executive management middle-east-and-north-africa english">
          <a href="#" class="circle-card-content" data-details_name="Member 11 Name" data-details_title="President & Chief Executive Officer"
            data-details_bio="<p>Dr. Jodice has led research teams on cross-national political instability and violence (Science Center Berlin), surveys in developing countries (Research Management Services) and full-service opinion, media and market research (D3 Systems, Inc.) from 1977 to 2015. He is the Founder and President of D3 Systems, a co-founder of full-service research companies in Afghanistan (ACSOR), Bosnia & Herzegovina (MIB) and Kenya (Infinite Insight). With Matthew Warshaw (also D3) and colleagues from Bulgaria (Kantcho Stoychev and Andrei Raichev) he has co-founded Research Control Solutions. A key driver for Dr. Jodice is capacity building - at home and abroad - at the individual, team, and company levels.</p>" data-staff_team="Management" data-staff_yearsexp="40" data-staff_degrees="B.A. in History (Gordon College), M.A. and Ph.D. in Government (Harvard)" data-staff_languages="English" data-staff_countryexp="Afghanistan, Bosnia, Herzegovina, and Kenya">
            <img src="images/headshots/david-jodice.jpg" class="img-circle center-block" alt="David Jodice" />
            <h4>David A. Jodice, Ph.D.</h4>
            <p>President and Chief Executive Officer</p>
          </a>
        </div>
        <div class="grid-item circle-card executive management middle-east-and-north-africa english">
          <a href="#" class="circle-card-content" data-details_name="Member 12 Name" data-details_title="President & Chief Executive Officer"
            data-details_bio="<p>Dr. Jodice has led research teams on cross-national political instability and violence (Science Center Berlin), surveys in developing countries (Research Management Services) and full-service opinion, media and market research (D3 Systems, Inc.) from 1977 to 2015. He is the Founder and President of D3 Systems, a co-founder of full-service research companies in Afghanistan (ACSOR), Bosnia & Herzegovina (MIB) and Kenya (Infinite Insight). With Matthew Warshaw (also D3) and colleagues from Bulgaria (Kantcho Stoychev and Andrei Raichev) he has co-founded Research Control Solutions. A key driver for Dr. Jodice is capacity building - at home and abroad - at the individual, team, and company levels.</p>" data-staff_team="Management" data-staff_yearsexp="40" data-staff_degrees="B.A. in History (Gordon College), M.A. and Ph.D. in Government (Harvard)" data-staff_languages="English" data-staff_countryexp="Afghanistan, Bosnia, Herzegovina, and Kenya">
            <img src="images/headshots/david-jodice.jpg" class="img-circle center-block" alt="David Jodice" />
            <h4>David A. Jodice, Ph.D.</h4>
            <p>President and Chief Executive Officer</p>
          </a>
        </div>        
      </ul><!--grid-->
    </div>
  </section>
  <section id="subsidiaries">
    <div class="hero" style="background-image:url('images/pointing-to-phone.jpg'); background-position:center center;">
      <div class="container">
        <div class="hero-caption">
          <h1>Our Subsidiaries</h1>
          <p>Capacity building has been a priority at D3 since day one.</p>
        </div>
      </div>
    </div>
    <div class="section-intro">
      <div class="container">
        <p>Over many years, D3 has cultivated deep and successful relationships with local field teams to implement scientifically rigorous methodologies, even in the most challenging environments. These direct investments enable our team to collect reliable data in hard to reach markets.</p>
      </div>
    </div>
    <div id="subsidiaries-grid">
      <div class="container">
        <div id="subsidiaries_grid" class="grid">
          <div class="grid-item circle-card">
            <a href="#" class="circle-card-content" data-subsidiary_address="House 217, 2nd Street<br />Qalaye Fatullah<br />Kabul District 10, Afghanistan" data-subsidiary_phone="+93 0 70 29 79 86" data-subsidiary_contact="<a href='mailto:research@acsor-surveys.com'>research@acsor-surveys.com</a><br /><a href='http://acsor-surveys.com/'>Visit Website</a>" data-details_name="ACSOR" data-details_title="Afghan Center for Socio-Economic and Opinion Research" data-details_bio="<p>Founded in 2003, the Afghan Center for Socio-Economic and Opinion Research (ACSOR) si the first registered for-profit market and opinion research firm operating in Afghanistan. As a full-services research firm, ACSOR specializes in providing individualized opinion polling, monitoring and evaluation, marketing and consumer studies, media monitoring, and other quantitative and qualitative research for a variety of clients. With a staff of over 40 full-time employees in Kabul, more than 65 field supervisors, a pool of over 1,000 male and female multi-ethnic interviewers, and a large cadre of media monitors, data entry specialists, transcribers, and translators, ACSOR works diligently to adhere to the ethics and standards of the American Association of Public Opinion Research (AAPOR) and the European Society for Opinion and Marketing Research (ESOMAR).</p>">
              <span class="gradient-circle-border">
                <img src="images/subsidiaries/acsor_logo.png" class="img-circle center-block" alt="ACSOR" />
              </span>
              <h4>ACSOR</h4>
              <p>Afghan Center for Socio-Economic and Opinion Research</p>
            </a>
          </div>
          <div class="grid-item circle-card">
            <a href="#" class="circle-card-content" data-subsidiary_address="8300 Greensboro Drive, Suite 450<br />Tysons Corner, VA 22102" data-subsidiary_phone="+1 703 388 2450" data-subsidiary_contact="<a href='mailto:info@researchcontrolsolutions.com'>info@researchcontrolsolutions.com</a><br /><a href='https://resaerchcontrolsolutions.com'" data-details_name="RCS" data-details_title="Research Control Solutions (RCS)" data-details_bio="<p>Research Control Solutions (RCS) was formally established as a subsidiary of D3 in 2012, and was inspire by d3's saerch for an affordable solution for electronic data capture capable of overcoming field challenges in difficult research environments. RCS offers highly customizable tools to streamline data collection, allowing clients to conduct surveys online, face-to-face with a mobile application, or over the phone with a CATI system. RCS products increase field efficiency, improve data quality, and provide real-time data monitoring to drive actionable results.</p>">
              <span class="gradient-circle-border">
                <img src="images/subsidiaries/rcs_logo.png" class="img-circle center-block" alt="RCS" />
              </span>
              <h4>RCS</h4>
              <p>Research Control Solutions (RCS)</p>
            </a>
          </div>
          <div class="grid-item circle-card">
            <a href="#" class="circle-card-content" data-subsidiary_address="Mirage Tower 1, Suite 5, 5th Floor<br />Chiromo Road, P.O. Box 1324, 00606<br />Nairobi, Kenya" data-subsidiary_phone="+254 727 600802" data-subsidiary_contact="<a href='mailto:info@infiniteinsight.net'>info@infiniteinsight.net</a><br /><a href='http://www.infiniteinsight.net'>http://www.infiniteinsight.net</a>" data-details_name="Infinite Insight" data-details_bio="<p>Established in 2010, Infinite Insight is a full-service market research agency located in Nairobi, Kenya. With past performance in 27 countries across Aftica, Infinite Insight boasts a staff of 1,500 interviewers, a team of Quality Control Officers, and the capacity to implement quantitative and qualitative data via face-to-face and mobile data collection techniques across a variety of sectors. Infinite Insight is a member of the European Society for Opinion and Market Research (ESOMAR), the World Association of Public Opinion Researchers (WAPOR), the Gallup International Association (WIN/GIA), the Marketing & Social Research Association (MSRA), the Pan-African Media Research Organization (PAMRO), and the Sourthern African Marketing Research Association (SAMRA), among others. D3 has been associated with Infinite Insight since August 2011.</p>">
              <span class="gradient-circle-border">
                <img src="images/subsidiaries/infinite-insight_logo.png" class="img-circle center-block" alt="Infinite Insight Logo" />
              </span>
              <h4>Infinite Insight</h4>
            </a>
          </div>
          <div class="grid-item circle-card">
            <a href="#" class="circle-card-content" data-subsidiary_address="Muhameda ef.Pand&zcaron;e 4b<br />Sarajevo 71000<br />Bosnia and Herzegovnia" data-subsidiary_phone="+ 387 33 273 970" data-subsidiary_contact="<a href='mailto:office@tns-mib.ba'>office@tns-mib.ba</a><br /><a href='http://www.tnsglobal.com/office/tns-mareco-index-bosnia'>http://www.tnsglobal.com/office/tns-mareco-index-bosnia</a>" data-details_name="MiB" data-details_bio="<p>TNS Mareco Index Bosnia (MiB) is the first independent market research company in Bosnia and Herzegovina, founded in 1996. MiB is a full service public opinion, media, and market research company operating in both entities and district Brcko, conducting both quantitative and qualitative research throughout the country. MiB is a member of the European Society for Opinion and Market Research (ESOMAR), the World Association of Public Opinion Researchers (WAPOR), and the Gallup International Association and follows ESOMAR and WAPOR research standards. MiB central office staff consists of 10 full-time and 32 part-itme researchers with a field network of 12 supervisors and 140 interviewers, as well as a CATI center.</p>">
              <span class="gradient-circle-border">
                <img src="images/subsidiaries/kantar-tns_logo.png" class="img-circle center-block" alt="" />
              </span>
              <h4>MiB</h4>
              <p>Mareco Index Bosnia</p>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="clients">
    <div class="hero" style="background-image:url(images/urban-thailand.jpg); background-position:center center;">
      <div class="container">
        <div class="hero-caption">
          <h1>Our Clients</h1>
          <p>Our diverse past performance enables us to achieve a variety of research objectives across sectors.</p>
        </div>
      </div>
    </div>
    <div class="section-intro">
      <div class="container">
        <p>D3 is an industry leader, delivering global research solutions for international development organizations, foreign policy and defense entities, press and news organizations, and cross-sector think tanks. We also have conducted extensive audience and media measurement studies for a wide range of clients, including reputable international broadcasters.</p>
      </div>
    </div>
    <div id="clients-grid">
      <div id="new-noteworthy" class="client-section">
        <div class="container">
          <h2>New and Noteworthy</h2>
          <div class="grid">
            <div class="grid-item circle-card">
              <a href="#" class="circle-card-content">
                <img src="images/clients/new_noteworthy/abc_news.png" class="img-circle gradient-circle-border img-responsive center-block" alt="" />
                <h4>ABC News</h4>
              </a>
            </div>
            <div class="grid-item circle-card">
              <a href="#" class="circle-card-content">
                <img src="images/clients/new_noteworthy/BoozAllenGS.png" class="img-circle gradient-circle-border img-responsive center-block" alt="" />
                <h4>Booz Allen Hamilton</h4>
              </a>
            </div>
            <div class="grid-item circle-card">
              <a href="#" class="circle-card-content">
                <img src="images/clients/new_noteworthy/department-of-defense.png" class="img-circle gradient-circle-border img-responsive center-block" alt="" />
                <h4>Department of Defense</h4>
              </a>
            </div>
            <div class="grid-item circle-card">
              <a href="#" class="circle-card-content">
                <img src="images/clients/new_noteworthy/department-of-state.png" class="img-circle gradient-circle-border img-responsive center-block" alt="" />
                <h4>Department of State</h4>
              </a>
            </div>
            <div class="grid-item circle-card">
              <a href="#" class="circle-card-content">
                <img src="images/clients/new_noteworthy/FacebookGS.png" class="img-circle gradient-circle-border img-responsive center-block" alt="" />
                <h4>Facebook</h4>
              </a>
            </div>
            <div class="grid-item circle-card">
              <a href="#" class="circle-card-content">
                <img src="images/clients/new_noteworthy/IFADGS.png" class="img-circle gradient-circle-border img-responsive center-block" alt="" />
                <h4>IFADGS</h4>
              </a>
            </div>
            <div class="grid-item circle-card">
              <a href="#" class="circle-card-content">
                <img src="images/clients/new_noteworthy/NYUGS.png" class="img-circle gradient-circle-border img-responsive center-block" alt="" />
                <h4>NYUGS</h4>
              </a>
            </div>
            <div class="grid-item circle-card">
              <a href="#" class="circle-card-content">
                <img src="images/clients/new_noteworthy/prc.png" class="img-circle gradient-circle-border img-responsive center-block" alt="" />
                <h4>Pew Research Center</h4>
              </a>
            </div>
            <div class="grid-item circle-card">
              <a href="#" class="circle-card-content">
                <img src="images/clients/new_noteworthy/sesame.png" class="img-circle gradient-circle-border img-responsive center-block" alt="" />
                <h4>Sesame Workshop</h4>
              </a>
            </div>
            <div class="grid-item circle-card">
              <a href="#" class="circle-card-content">
                <img src="images/clients/new_noteworthy/UNDP.png" class="img-circle gradient-circle-border img-responsive center-block" alt="" />
                <h4>UNDP</h4>
              </a>
            </div>
            <div class="grid-item circle-card">
              <a href="#" class="circle-card-content">
                <img src="images/clients/new_noteworthy/USAID.png" class="img-circle gradient-circle-border img-responsive center-block" alt="" />
                <h4>USAID</h4>
              </a>
            </div>
            <div class="grid-item circle-card">
              <a href="#" class="circle-card-content">
                <img src="images/clients/new_noteworthy/world_bank.png" class="img-circle gradient-circle-border img-responsive center-block" alt="" />
                <h4>World Bank</h4>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div id="international-development" class="client-section">
        <div class="container">
          <h2>International Development</h2>
          <div class="grid">
            <div class="grid-item circle-card">
              <a href="#" class="circle-card-content">
                <img src="images/clients/international_development/AbtAssociatesGS-1.png" class="img-circle gradient-circle-border img-responsive center-block" alt="" />
                <h4>Abt Associates</h4>
              </a>
            </div>
            <div class="grid-item circle-card">
              <a href="#" class="circle-card-content">
                <img src="images/clients/international_development/adam_smith.png" class="img-circle gradient-circle-border img-responsive center-block" alt="" />
                <h4>Adam Smith International</h4>
              </a>
            </div>
            <div class="grid-item circle-card">
              <a href="#" class="circle-card-content">
                <img src="images/clients/international_development/Chemonics-1.png" class="img-circle gradient-circle-border img-responsive center-block" alt="" />
                <h4>Chemonics</h4>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div id="foreign-policy-and-defense" class="client-section">
        <div class="container">
          <h2>Foreign Policy and Defense</h2>
          <div class="grid">
            <div class="grid-item circle-card">
              <a href="#" class="circle-card-content">
                <img src="images/clients/foreign_policy/Africom_emblem_2.png" class="img-circle gradient-circle-border img-responsive center-block" alt="" />
                <h4>Africom</h4>
              </a>
            </div>
            <div class="grid-item circle-card">
              <a href="#" class="circle-card-content">
                <img src="images/clients/foreign_policy/BoozAllenGS-1.png" class="img-circle gradient-circle-border img-responsive center-block" alt="" />
                <h4>Booz Allen Hamilton</h4>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div id="press-and-politics" class="client-section">
        <div class="container">
          <h2>Press and Politics</h2>
          <div class="grid">
            <div class="grid-item circle-card">
              <a href="#" class="circle-card-content">
                <img src="images/clients/press_politics/abc_news.png" class="img-circle gradient-circle-border img-responsive center-block" alt="" />
                <h4>ABC News</h4>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php get_footer(); ?>