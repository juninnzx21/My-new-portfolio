from reportlab.lib import colors
from reportlab.lib.enums import TA_LEFT
from reportlab.lib.pagesizes import A4
from reportlab.lib.styles import ParagraphStyle, getSampleStyleSheet
from reportlab.lib.units import mm
from reportlab.platypus import Paragraph, SimpleDocTemplate, Spacer, Table, TableStyle


OUTPUT_PATH = "public/Junior_Rodrigues_CV.pdf"


def build_pdf():
    doc = SimpleDocTemplate(
        OUTPUT_PATH,
        pagesize=A4,
        rightMargin=16 * mm,
        leftMargin=16 * mm,
        topMargin=16 * mm,
        bottomMargin=16 * mm,
    )

    styles = getSampleStyleSheet()
    styles.add(
        ParagraphStyle(
            name="CVName",
            parent=styles["Title"],
            fontName="Helvetica-Bold",
            fontSize=24,
            leading=28,
            textColor=colors.HexColor("#0f172a"),
            spaceAfter=6,
        )
    )
    styles.add(
        ParagraphStyle(
            name="CVRole",
            parent=styles["Heading2"],
            fontName="Helvetica-Bold",
            fontSize=13,
            leading=16,
            textColor=colors.HexColor("#149ddd"),
            spaceAfter=12,
        )
    )
    styles.add(
        ParagraphStyle(
            name="CVSection",
            parent=styles["Heading2"],
            fontName="Helvetica-Bold",
            fontSize=12,
            leading=14,
            textColor=colors.HexColor("#0f172a"),
            spaceBefore=12,
            spaceAfter=8,
            borderWidth=0,
        )
    )
    styles.add(
        ParagraphStyle(
            name="CVBody",
            parent=styles["BodyText"],
            fontName="Helvetica",
            fontSize=10,
            leading=14,
            alignment=TA_LEFT,
            textColor=colors.HexColor("#1f2937"),
            spaceAfter=6,
        )
    )
    styles.add(
        ParagraphStyle(
            name="CVSmall",
            parent=styles["BodyText"],
            fontName="Helvetica",
            fontSize=9,
            leading=12,
            textColor=colors.HexColor("#334155"),
            spaceAfter=4,
        )
    )
    styles.add(
        ParagraphStyle(
            name="CVBullet",
            parent=styles["BodyText"],
            fontName="Helvetica",
            fontSize=9.5,
            leading=12.5,
            leftIndent=10,
            bulletIndent=0,
            textColor=colors.HexColor("#1f2937"),
            spaceAfter=3,
        )
    )

    story = []

    story.append(Paragraph("Junior Rodrigues", styles["CVName"]))
    story.append(Paragraph("Full Stack PHP/Laravel Developer", styles["CVRole"]))
    story.append(
        Paragraph(
            "Belo Horizonte, MG - Brazil | contatojuninnzx@gmail.com | +55 31 9 9323-9198",
            styles["CVSmall"],
        )
    )
    story.append(
        Paragraph(
            "LinkedIn: linkedin.com/in/junior-rodrigues-68961b288 | GitHub: github.com/juninnzx21 | Portfolio: juninnzxtec.com.br",
            styles["CVSmall"],
        )
    )
    story.append(Spacer(1, 6))

    story.append(Paragraph("Professional Summary", styles["CVSection"]))
    story.append(
        Paragraph(
            "Full Stack PHP/Laravel Developer with hands-on experience building internal tools, CRUD systems, responsive interfaces, and database-driven applications. Strong background in PHP, Laravel, Blade, CodeIgniter, JavaScript, jQuery, Bootstrap, MySQL, MariaDB, Docker, and Git-based workflows.",
            styles["CVBody"],
        )
    )
    story.append(
        Paragraph(
            "I also bring production support experience from IT operations, troubleshooting, preventive maintenance, and daily system reliability routines. This combination helps me ship practical solutions, debug issues quickly, and work well with real business processes.",
            styles["CVBody"],
        )
    )

    story.append(Paragraph("Core Stack", styles["CVSection"]))
    stack_table = Table(
        [
            ["PHP", "Laravel", "CodeIgniter", "Blade"],
            ["JavaScript", "jQuery", "Bootstrap", "React"],
            ["MySQL", "MariaDB", "MongoDB", "API Integration"],
            ["Docker", "Git", "GitHub", "GitLab"],
            ["Linux", "Troubleshooting", "Technical Support", "System Maintenance"],
        ],
        colWidths=[42 * mm, 42 * mm, 42 * mm, 42 * mm],
    )
    stack_table.setStyle(
        TableStyle(
            [
                ("BACKGROUND", (0, 0), (-1, -1), colors.HexColor("#eff6ff")),
                ("TEXTCOLOR", (0, 0), (-1, -1), colors.HexColor("#0f172a")),
                ("FONTNAME", (0, 0), (-1, -1), "Helvetica-Bold"),
                ("FONTSIZE", (0, 0), (-1, -1), 8.5),
                ("LEADING", (0, 0), (-1, -1), 10),
                ("GRID", (0, 0), (-1, -1), 0.4, colors.white),
                ("BOX", (0, 0), (-1, -1), 0.4, colors.white),
                ("VALIGN", (0, 0), (-1, -1), "MIDDLE"),
                ("ALIGN", (0, 0), (-1, -1), "CENTER"),
                ("TOPPADDING", (0, 0), (-1, -1), 7),
                ("BOTTOMPADDING", (0, 0), (-1, -1), 7),
            ]
        )
    )
    story.append(stack_table)

    story.append(Paragraph("Professional Experience", styles["CVSection"]))
    story.append(Paragraph("<b>Junior Full Stack Developer</b> | 03/2023 - 12/2023", styles["CVBody"]))
    story.append(Paragraph("MKT - Elite Solucoes | Belo Horizonte, MG", styles["CVSmall"]))
    for bullet in [
        "Built and maintained PHP web applications using CodeIgniter 3 for business workflows and operational routines.",
        "Worked across backend and frontend layers with PHP, JavaScript, jQuery, HTML, CSS, Bootstrap, and database-driven interfaces.",
        "Delivered fixes, improvements, and feature updates in active systems.",
        "Worked with MySQL, MariaDB, MongoDB, API integrations, Git, GitHub, GitLab, Docker, and Linux-based environments.",
    ]:
        story.append(Paragraph(bullet, styles["CVBullet"], bulletText="•"))

    story.append(Spacer(1, 5))
    story.append(Paragraph("<b>IT Technician Level 2</b> | 2022 - 2023", styles["CVBody"]))
    story.append(Paragraph("Santa Casa BH | Belo Horizonte, MG", styles["CVSmall"]))
    for bullet in [
        "Provided remote and onsite support in a high-demand environment.",
        "Performed preventive maintenance, infrastructure checks, and issue diagnosis.",
        "Helped maintain operational continuity and service reliability.",
    ]:
        story.append(Paragraph(bullet, styles["CVBullet"], bulletText="•"))

    story.append(Spacer(1, 5))
    story.append(Paragraph("<b>N1 Support Analyst</b> | 03/2024 - 12/2024", styles["CVBody"]))
    story.append(Paragraph("QA - IT Answer | Belo Horizonte, MG", styles["CVSmall"]))
    for bullet in [
        "Supported users by resolving hardware, software, and connectivity issues.",
        "Applied troubleshooting skills to keep systems available and stable.",
        "Contributed to process improvement and faster issue resolution.",
    ]:
        story.append(Paragraph(bullet, styles["CVBullet"], bulletText="•"))

    story.append(Paragraph("Selected Projects", styles["CVSection"]))
    for title, body in [
        ("Task Management System", "Laravel and Blade application with authentication, profile management, task CRUD, and category management."),
        ("Course Catalog Management", "PHP CRUD project for creating, editing, and deleting course records with real-time database persistence."),
        ("Institutional Business Website", "Responsive website focused on service presentation, lead capture, and structured business communication."),
    ]:
        story.append(Paragraph(f"<b>{title}</b>", styles["CVBody"]))
        story.append(Paragraph(body, styles["CVSmall"]))

    story.append(Paragraph("Education", styles["CVSection"]))
    story.append(Paragraph("<b>Systems Analysis and Development</b> | UNOPAR Minas | 2022 - In progress", styles["CVSmall"]))
    story.append(Paragraph("<b>High School Completion</b> | Frei Eustaquio State School | 2016 - 2019", styles["CVSmall"]))

    story.append(Paragraph("Availability", styles["CVSection"]))
    for bullet in [
        "Open to Brazil-based opportunities.",
        "Open to international remote roles.",
        "Available for freelance, PJ, and CLT opportunities.",
    ]:
        story.append(Paragraph(bullet, styles["CVBullet"], bulletText="•"))

    doc.build(story)


if __name__ == "__main__":
    build_pdf()
